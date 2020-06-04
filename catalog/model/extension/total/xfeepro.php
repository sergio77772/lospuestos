<?php 
class ModelExtensionTotalXfeepro extends Model {
    private $mtype;
    private $ext_path;
    public function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        $this->ocm = ($ocm = $this->registry->get('ocm_front')) ? $ocm : new OCM\Front($this->registry);
        $this->mtype = 'total';
        $this->ext_path = 'extension/total/xfeepro';
    }
    public function getTotal($total) {
        $default_order = (int)$this->ocm->getConfig('sub_total_sort_order', 'total') + 1;
        $_totals = $this->getXfeeTotal($total['totals'], $total['total'], $total['taxes']);
        if ($_totals)  {
            foreach($_totals as $single) {
                /* Calculating tax/vat */
                if ($single['tax_class_id']) {
                    $tax_rates = $this->tax->getRates($single['cost'], $single['tax_class_id']);
                    foreach ($tax_rates as $tax_rate) {
                        if (!isset($total['taxes'][$tax_rate['tax_rate_id']])) {
                            $total['taxes'][$tax_rate['tax_rate_id']] = 0; // initialize 
                        }
                        $total['taxes'][$tax_rate['tax_rate_id']] += $tax_rate['amount'];
                    }
                }
                $total['total'] += $single['cost'];
                /* End of tax*/ 
                $total['totals'][] = array( 
                    'code'       => 'xfeepro', 
                    'xcode'      =>  $single['code'],
                    'title'      =>  $single['title'],
                    'value'      =>  $single['cost'],
                    'sort_order' => !$single['sort_order'] ? $default_order : (int)$single['sort_order']
                );
            }
        }
    }
    private function getXfeeTotal($totals, $total, $taxes) {
        $this->load->language($this->ext_path);
        $language_id = $this->config->get('config_language_id');
        $address = $this->_replenishAddress();
        $compare_with = $this->_getCommonParams($address);
        $method_data = array();
        $quote_data = array();
        $sort_data = array(); 
        $xfeepro_debug = $this->ocm->getConfig('xfeepro_debug', $this->mtype);
        $currency_code = isset($this->session->data['currency']) ? $this->session->data['currency'] : $this->config->get('config_currency');
        $debugging = array();
        $xfees = $this->getFees();
        $xmethods = $xfees['xmethods'];
        $xmeta = $xfees['xmeta'];
        $cart_products = $this->cart->getProducts();
        $_cart_data =  $this->getProductProfile($cart_products, $xmeta);
        if (!$_cart_data['sub']) return array();
        $_cart_data = $this->fixRounding($_cart_data);
        $geo_ids = array();
        $geo_rows = $this->db->query("SELECT geo_zone_id FROM " . DB_PREFIX . "zone_to_geo_zone WHERE country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')")->rows; 
        foreach ($geo_rows as $geo_row) {
            $geo_ids[] = $geo_row['geo_zone_id'];
        }
        $compare_with['products'] = $_cart_data['products'];
        $compare_with['geo'] = $geo_ids;
        $compare_with['product'] = $_cart_data['product'];
        $compare_with['category'] = $_cart_data['category'];
        $compare_with['manufacturer'] = $_cart_data['manufacturer'];
        $compare_with['option'] = $_cart_data['option'];
        $compare_with['location'] = $_cart_data['location'];
        $compare_with['total'] = $_cart_data['total'];
        $compare_with['weight'] = $_cart_data['weight'];
        $compare_with['quantity'] = $_cart_data['quantity'];
        foreach($xmethods as $xfeepro) {
            $rules = $xfeepro['rules'];
            $rates = $xfeepro['rates'];
            $tab_id = $xfeepro['tab_id'];
            $debugging_message = array();
            /* if shipping_base is found on shipping_methods list, consider that */
            if (isset($rules['shipping']) && in_array($compare_with['shipping_base'], $rules['shipping']['value'])) {
                $compare_with['shipping_method'] = $compare_with['shipping_base'];
            }
            $alive_or_dead = $this->_crucify($rules, $compare_with, false);
            if (!$alive_or_dead['status']) {
                $debugging_message = $alive_or_dead['debugging'];
                $debugging[] = array('name' => $xfeepro['display'],'filter' => $debugging_message,'index' => $tab_id);
            } else {
                $status = true;
                $cost = 0;
                $percent_of = $_cart_data['total'];
                $cost = $rates['percent'] ? ($rates['value'] * $percent_of) : $rates['value'];
                if (!$status) {
                   $debugging[] = array('name' => $xfeepro['display'],'filter' => $debugging_message,'index' => $tab_id);
                }
                if ($status) {
                    $quote_data['xfeepro'.$tab_id] = array(
                        'code'         => 'xfeepro'.$tab_id,
                        'tab_id'       => $tab_id,
                        'title'        => $xfeepro['name'][$language_id],
                        'display'      => $xfeepro['display'],
                        'cost'         => $cost,
                        'sort_order'   => $xfeepro['sort_order'],
                        'tax_class_id' => $xfeepro['tax_class_id']
                    );
                }
            } 
        }
        if ($xfeepro_debug) {
           $this->ocm->writeLog($debugging, 'xfeepro');
        }
       /*Sorting final method*/
        $sort_order = array();
        foreach ($quote_data as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
        }
        array_multisort($sort_order, SORT_ASC, $quote_data);
        return $quote_data;
    }
    private function fixRounding($cart_data) {
        $keys = array('sub', 'total', 'grand', 'grand_shipping', 'grand_wtax');
        foreach ($keys as $key) {
            if (isset($cart_data[$key]) && $cart_data[$key]) {
                $cart_data[$key] = round($cart_data[$key], 2);
            }
        }
        return $cart_data;
    }
    private function getProductProfile($cart_products, $xmeta) {
            $cart_categories = array();
            $cart_product_ids = array();
            $cart_manufacturers = array();
            $cart_options = array();
            $cart_locations = array();
            $cart_volume = 0;
            $cart_quantity = 0;
            $cart_weight = 0;
            $cart_sub = 0;
            $cart_total = 0;
            $cart_ean = 0;
            $cart_jan = 0;
            $multi_category = false;
            $tax_data = array();
            $default = array(
                'tax_class_id'     => 0,
                'weight_class_id'  => 0,
                'length_class_id'  => 0
            );
            foreach($cart_products as &$product) {
                $product = array_merge($default, $product);
                $cart_product_ids[] = $product['product_id']; 
                $product['product'] = $product['product_id']; /* Use same key for all places */
                $total_with_tax = $this->tax->calculate($product['price'], $product['tax_class_id']) * $product['quantity'];
                $weight_class_id = $product['weight_class_id'] ? $product['weight_class_id'] : $this->config->get('config_weight_class_id');
                $weight = $this->weight->convert($product['weight'], $weight_class_id, $this->config->get('config_weight_class_id'));
                $product['category'] = array();
                if ($xmeta['category_query']) {
                    $product_categories = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product['product_id'] . "'")->rows;
                    if ($product_categories) {
                        if (count($product_categories)>1) $multi_category = true;
                        foreach($product_categories as $category) {
                            $cart_categories[]=$category['category_id'];  
                            $product['category'][]=$category['category_id']; //store for future use 
                        } 
                    }
                }
                $length_class_id = $product['length_class_id'] ? $product['length_class_id'] : $this->config->get('config_length_class_id');
                $length = $this->length->convert($product['length'], $length_class_id, $this->config->get('config_length_class_id'));
                $width = $this->length->convert($product['width'], $length_class_id, $this->config->get('config_length_class_id'));
                $height = $this->length->convert($product['height'], $length_class_id, $this->config->get('config_length_class_id'));
                $volume = ($width * $height * $length);
                $cart_volume += ($volume * $product['quantity']);
                $cart_quantity += $product['quantity'];
                $cart_sub += $product['total'];
                $cart_total += $total_with_tax;
                $cart_weight += $weight;
                $product['length'] = $product['length'] * $product['quantity'];
                $product['width'] = $product['width'] * $product['quantity'];
                $product['height'] = $product['height'] * $product['quantity'];
                $product['total_with_tax'] = $total_with_tax;
                $product['volume'] = $volume * $product['quantity'];
                $product['weight'] = $weight;
                $product['length_self'] = $length;
                $product['width_self'] = $width;
                $product['height_self'] = $height;
                $product['volume_self'] = $volume; 
                $product['weight_self'] = ($weight / $product['quantity']);
                $product['price_self'] = $product['price'];
                if ($xmeta['product_query']) {
                    $product_info = $this->db->query("SELECT manufacturer_id, location, jan, ean FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product['product_id'] . "'")->row;
                    if ($product_info){
                        $cart_ean += (float)$product_info['ean'] * $product['quantity'];
                        $cart_jan += (float)$product_info['jan'] * $product['quantity'];
                        if ($product_info['manufacturer_id']) {
                            $cart_manufacturers[] = $product_info['manufacturer_id'];
                            $product['manufacturer'] = $product_info['manufacturer_id']; //store for future use
                        }
                        $location = trim(strtolower($product_info['location']));
                        if ($location) {
                            $product['location'] = $location; //store for future use
                            $cart_locations[] = $location;
                        }
                    }
                }
                $options = array();
                if (isset($product['option']) && $product['option'] && is_array($product['option'])) {
                    foreach($product['option'] as $option) {
                        if ($option['type'] == 'select' || $option['type'] == 'radio' || $option['type'] == 'checkbox') {
                            $cart_options[] = $option['option_value_id'];  
                            $options[] = $option['option_value_id'];
                        }
                    }
                }
                $product['option'] = $options; //store for future use 
                /* Tax Data */
                if ($product['tax_class_id']) {
                    $tax_rates = $this->tax->getRates($product['price'], $product['tax_class_id']);
                    foreach ($tax_rates as $tax_rate) {
                        if (!isset($tax_data[$tax_rate['tax_rate_id']])) $tax_data[$tax_rate['tax_rate_id']] = 0;
                        $tax_data[$tax_rate['tax_rate_id']] += ($tax_rate['amount'] * $product['quantity']);
                    }
                }
            }
            //add vouchers if available 
            if (isset($this->session->data['vouchers']) && is_array($this->session->data['vouchers'])) {
                foreach ($this->session->data['vouchers'] as $voucher) {
                    $cart_sub += $voucher['amount'];
                    $cart_total += $voucher['amount'];
                }
            }
            $cart_categories = array_unique($cart_categories);
            $cart_product_ids = array_unique($cart_product_ids);
            $cart_manufacturers = array_unique($cart_manufacturers);
            $cart_options = array_unique($cart_options);
            $cart_locations = array_unique($cart_locations);
            return array(
                'products' => $cart_products,
                'category' => $cart_categories,
                'product' => $cart_product_ids,
                'manufacturer' => $cart_manufacturers,
                'option' => $cart_options,
                'location' => $cart_locations,
                'volume' => $cart_volume,
                'multi_category' => $multi_category,
                'no_category' => count($cart_categories),
                'no_manufacturer' => count($cart_manufacturers),
                'no_location' => count($cart_locations),
                'quantity' => $cart_quantity,
                'weight' => $cart_weight,
                'total' => $cart_total,
                'sub' => $cart_sub,
                'grand' => $cart_total,
                'grand_wtax' => $cart_total,
                'jan' => $cart_jan,
                'ean' => $cart_ean,
                'coupon' => 0,
                'reward' => 0,
                'distance' => 0,
                'tax_data' => $tax_data,
                'xfeepro' => array()
            );
    }
    private function getFees() {
        $xfeepro = $this->cache->get('ocm.xfeepro');
        if (!$xfeepro) {
            $language_id = $this->config->get('config_language_id');
            $xmethods = array();
            $xmeta = array(
                'geo' => true,
                'category_query' => false,
                'product_query' => false,
                'distance' => false
            );
            $xfeepro_rows = $this->db->query("SELECT * FROM `" . DB_PREFIX . "xfeepro` order by `sort_order` asc")->rows;
            foreach($xfeepro_rows as $xfeepro_row) {
                $method_data = $xfeepro_row['method_data'];
                $method_data = json_decode($method_data, true);
                /* cache only valid shipping */
                if ($method_data && is_array($method_data) && $method_data['status']) {
                    $method_data =  $this->_resetEmptyRule($method_data);
                    $rules = $this->_findValidRules($method_data);
                    $rates = $this->_findRawRate($method_data);
                    $xmethods[] = array(
                       'tab_id' => (int)$xfeepro_row['tab_id'],
                       'name' => $method_data['name'],
                       'display' => $method_data['display'],
                       'rules' => $rules,
                       'rates' => $rates,
                       'tax_class_id' => (int)$method_data['tax_class_id'],
                       'sort_order' => (int)$method_data['sort_order']
                    );
                }
            }
            $xfeepro = array('xmeta' => $xmeta, 'xmethods' => $xmethods);
            $this->cache->set('ocm.xfeepro', $xfeepro);
        }
        return $xfeepro;
   }
    private function _resetEmptyRule($data) {
        $rules = array(
            'geo_zone' => 'geo_zone_all',
            'payment' => 'payment_all',
            'shipping'  => 'shipping_all'
        );
        foreach ($rules as $key => $value) {
            if (!isset($data[$value])) {
                $data[$value] = '';
            }
            if (!isset($data[$key]) || !$data[$key]) {
                $data[$value] = 1;
            }
            /* make empty product entry if all is selected */
            if ($data[$value] < 2 && in_array($key, array('product_category', 'product_product', 'product_option', 'manufacturer', 'location'))) {
                $data[$key] = array();
            }
        }
        if (!isset($data['name']) || !is_array($data['name'])) $data['name']=array();
        return $data;
    }
    private function _findValidRules($data) {
        $rules = array();
        if ($data['geo_zone_all'] != 1) {
            $rules['geo_zone'] = array(
                'type' => 'intersect',
                'product_rule' => false,
                'address_rule' => true,
                'value' => $data['geo_zone'],
                'compare_with' => 'geo',
                'false_value' => false
            );
        }
        if ($data['payment_all'] != 1) {
            $rules['payment'] = array(
                'type' => 'in_array',
                'product_rule' => false,
                'address_rule' => false,
                'value' => $data['payment'],
                'compare_with' => 'payment_method',
                'false_value' => false
            );
        }
        if ($data['shipping_all'] != 1) {
            $rules['shipping'] = array(
                'type' => 'in_array',
                'product_rule' => false,
                'address_rule' => false,
                'value' => $data['shipping'],
                'compare_with' => 'shipping_method',
                'false_value' => false
            );
        }
        return $rules;
    }
    private function _findRawRate($data) {
        $operators= array('+','-','/','*');
        $rates = array();
        $rates['type'] = $data['rate_type'];
        /* Shipping Cost */
        if ($data['rate_type'] == 'flat') {
            $cost = trim($data['cost']);
            if (substr($cost, -1) == '%') {
                $cost = rtrim($cost,'%');
                $rates['percent'] = true;
                $rates['value'] = (float)$cost / 100;
            } else {
                $rates['percent'] = false;
                $rates['value'] = (float)$cost;
            }
        }
        return $rates;
    }
    private function _crucify($rules, $data, $product_and_or, $ingore_product_rule = false) {
            $status = true;
            $product_status = false;
            $product_rules = array();
            $debugging = array();
            foreach ($rules as $name => $rule) {
                if ($ingore_product_rule && $rule['product_rule']) {
                  continue;
                }
                $_debug_hint = $rule['compare_with'] !== 'products' ? $data[$rule['compare_with']] : $rule['value'];
                $debug_value = is_array($_debug_hint) ? implode(',', $_debug_hint) : $_debug_hint;
                if ($rule['type'] == 'in_array') {
                    if (in_array($data[$rule['compare_with']], $rule['value']) === (boolean)$rule['false_value']) {
                        $debugging[] = $name . '('.$debug_value.')';
                        $status = false;
                        break;
                    }
                }
                if ($rule['type'] == 'intersect') {
                    if ((boolean)$this->array_intersect_faster($data[$rule['compare_with']], $rule['value']) === (boolean)$rule['false_value']) {
                        $debugging[] = $name . '('.$debug_value.')';
                        $status = false;
                        break;
                    }
                }
                if ($rule['type'] == 'in_between') {
                    if ($data[$rule['compare_with']] < $rule['start'] ||  $data[$rule['compare_with']] > $rule['end']) {
                        $debugging[] = $name . '('.$debug_value.')';
                        $status = false;
                        break;
                    }
                }
                if ($rule['type'] == 'in_array_not_equal') {
                    if ($data[$rule['not_equal_with']] == $rule['not_equal_value'] && in_array($data[$rule['compare_with']], $rule['value']) === (boolean)$rule['false_value']) {
                        $debugging[] = $name . '('.$debug_value.')';
                        $status = false;
                        break;
                    }
                }
                if ($rule['type'] == 'function') {
                    $_return = $this->{$rule['func']}($rule['value'], $data[$rule['compare_with']], $rule['rule_type']);
                    if ($rule['product_rule'] && $product_and_or) {
                        $product_status |= $_return;
                        $product_rules[$name] = $_return;
                    } else {
                        if ($_return === (boolean)$rule['false_value']) {
                            $debugging[] = $name . '('.$debug_value.')';
                            $status = false;
                            break;
                        }
                    }
                }
            }
            /* check or_mode for product rules */
            if ($product_and_or && $product_rules && !$product_status) {
                $status = false;
                foreach ($product_rules as $key => $value) {
                    if (!$value) {
                        $debugging[] = $key;
                    }
                }
            }
            return array(
              'status' => $status,
              'debugging' => $debugging
            );
    }
    private function _replenishAddress() { 
        $address = array();
        if (isset($this->session->data['payment_address'])) $address = $this->session->data['payment_address'];
        if (!isset($address['zone_id'])) $address['zone_id'] = '';
        if (!isset($address['country_id'])) $address['country_id'] = '';
        if (!isset($address['city'])) $address['city'] = '';
        if (!isset($address['postcode'])) $address['postcode'] = '';
        $fields = array('zone_id', 'country_id', 'city', 'postcode');
        $sessions = array('shipping_address');
        foreach ($sessions as $key) {
            foreach ($fields as $field) {
                if (!$address[$field]
                  && isset($this->session->data[$key])
                  && isset($this->session->data[$key][$field])
                  && $this->session->data[$key][$field]) {
                     $address[$field] = $this->session->data[$key][$field];
                }
            }
        }
        /* Still country emptry, set default one */
        if (!$address['country_id']) {
            $address['country_id'] = $this->config->get('config_country_id');
        }
        /* all option has failed for postal and city, lets fetch from address book */
        if (!$address['postcode'] && !$address['city'] && $this->customer->isLogged()) {
            $this->load->model('account/address');
            $customer_address = $this->model_account_address->getAddress($this->customer->getAddressId());
            if ($customer_address) {
                $address['postcode'] = $customer_address['postcode'];
                $address['city'] = $customer_address['city'];
            }
        }
        $address['city'] = strtolower(trim($address['city']));
        $address['postcode'] = strtolower(trim($address['postcode']));
        return $address;
    }
    private function _getCommonParams($address) {
        $param = array();
        if (isset($_POST['customer_group_id']) && $_POST['customer_group_id']) {
            $customer_group_id = $_POST['customer_group_id'];
        }
        elseif (isset($_GET['customer_group_id']) && $_GET['customer_group_id']) {
            $customer_group_id = $_GET['customer_group_id'];
        }
        elseif ($this->customer->isLogged()) {
            $customer_group_id = $this->customer->getGroupId();
        } elseif (isset($this->session->data['customer']) && isset($this->session->data['customer']['customer_group_id']) && $this->session->data['customer']['customer_group_id']) {
            $customer_group_id = $this->session->data['customer']['customer_group_id'];     
        } else {
            $customer_group_id = 0;
        }
        $store_id = $this->config->get('config_store_id');
        $store_id = isset($this->request->post['store_id']) ? $this->request->post['store_id'] : $store_id;
        $store_id = isset($this->request->get['store_id']) ? $this->request->get['store_id'] : $store_id;
        $payment_method = isset($this->session->data['payment_method']['code'])?$this->session->data['payment_method']['code']:'';
        if (isset($this->session->data['default']['payment_method']['code'])) $payment_method = $this->session->data['default']['payment_method']['code'];
        $payment_method = isset($this->request->post['payment_method']) && $this->request->post['payment_method'] ? $this->request->post['payment_method'] : $payment_method;
        $shipping_method = isset($this->session->data['shipping_method']['code'])?$this->session->data['shipping_method']['code']:'';
        if (isset($this->session->data['default']['shipping_method']['code'])) $shipping_method = $this->session->data['default']['shipping_method']['code'];
        $shipping_method = isset($this->request->post['shipping_method']) && $this->request->post['shipping_method'] ? $this->request->post['shipping_method'] : $shipping_method;
        if (strpos($shipping_method, 'xshippingpro') !== false) {
            $shipping_method = explode('_', $shipping_method)[0];
        }
        $shipping_parts = explode('.',$shipping_method);
        $shipping_base = array_shift($shipping_parts);
        /* currency */
        $currency_code = isset($this->session->data['currency']) ? $this->session->data['currency'] : $this->config->get('config_currency');
        $currency_id = $this->currency->getId($currency_code);
        /* Coupon code */
        $coupon_code = '';
        if (isset($this->session->data['default']['coupon']) && $this->session->data['default']['coupon']) {
            $coupon_code = $this->session->data['default']['coupon'];
        }
        if (isset($this->session->data['coupon']) && $this->session->data['coupon']) {
            $coupon_code = $this->session->data['coupon'];
        }
        if ($coupon_code) {
            $coupon_code = strtolower($coupon_code);
        }
        $param['customer_id'] = $this->customer->getId();
        $param['store_id'] = $store_id;
        $param['customer_group_id'] = $customer_group_id;
        $param['payment_method'] = $payment_method;
        $param['shipping_method'] = $shipping_method;
        $param['shipping_base'] = $shipping_base;
        $param['coupon_code'] = $coupon_code;
        $param['city'] = $address['city'];
        $param['country_id'] = $address['country_id'];
        $param['zone_id'] = $address['zone_id'];
        $param['postcode'] = $address['postcode'];
        $param['currency_id'] = $currency_id;
        $param['time'] = date('G');
        $param['date'] = date('Y-m-d');
        $param['day'] = date('w');
        return $param;
    }
    private function array_intersect_faster($array1, $array2) {
        $is_found = false;
        foreach ($array1 as $key) {
           if (in_array($key, $array2)) {
                $is_found = true;
                break;
            }
        }
        return $is_found;
    }
}