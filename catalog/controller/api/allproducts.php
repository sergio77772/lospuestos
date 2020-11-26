<?php
class ControllerApiAllproducts extends Controller {
    private $error = array();

    // All Products
    public function index(){
        $products = array();
        $this->load->language('catalog/product');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        $error[]['no_json']= "No JSON";

        $product_total = $this->model_catalog_product->getTotalProducts();

        $results = $this->model_catalog_product->getProducts();

        foreach ($results as $result) {
            if (is_file(DIR_IMAGE . $result['image'])) {
                $image = $this->model_tool_image->resize($result['image'], 40, 40);
            } else {
                $image = $this->model_tool_image->resize('no_image.png', 40, 40);
            }
                
            $special = false;

            $product_specials = $this->model_catalog_product->getProductSpecials($result['product_id']);

            foreach ($product_specials  as $product_special) {
                //if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
                    $special = $product_special['price'];

                    //break;
               // }
            }
       
            $shop_products['shop_products'][] = array(
                'product_id' => $result['product_id'],
                'image'      => $image,
                'name'       => $result['name'],
				'descripcion'=>$result['description'],
                'model'      => $result['model'],
                'price'      => $result['price'],
                'special'    => $special,
                'quantity'   => $result['quantity'],
                'status'     => $result['status']
            );
        }

        if (isset($this->request->get['json'])) {
            echo json_encode($shop_products);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }  
    }








    // Product info Page
    public function productInfo(){

        $this->load->language('catalog/product');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        $product_details = array();
        $error['fail'] = 'Failed';

        if (isset($this->request->get['product_id'])) {
            //$product_details['product_id'] = $this->request->get['product_id'];
            $product_details = $this->model_catalog_product->getProduct($this->request->get['product_id']);
            echo json_encode($product_details);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }
    }









    // Category Listing Page
    public function categories(){ 

        $shop_categories = array();
        $this->load->model('catalog/category');
        $error['fail'] = 'Failed';

        if (isset($this->request->get['json'])) {
            $shop_categories =$this->model_catalog_category->getCategories();
            echo json_encode($shop_categories);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }
    }

    // Product Listing By Category
    public function categoryList(){ 

        $this->load->model('catalog/category');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $error['fail'] = 'Failed';

        if (isset($this->request->get['path'])) {
            $url = '';
            $path = '';
            $parts = explode('_', (string)$this->request->get['path']);

            $category_id = (int)array_pop($parts);

            foreach ($parts as $path_id) {
                if (!$path) {
                    $path = (int)$path_id;
                } else {
                    $path .= '_' . (int)$path_id;
                }

                $category_info = $this->model_catalog_category->getCategory($path_id);
            }
        } else {
            $category_id = 0;
        }

        $category_info = $this->model_catalog_category->getCategory($category_id);

        if ($category_info) {

            $url = '';
            //$data['categories'] = array();
            $results = $this->model_catalog_category->getCategories($category_id);

            foreach ($results as $result) {
                $filter_data = array(
                    'filter_category_id'  => $result['category_id'],
                    'filter_sub_category' => true
                );

            }

            $products = array();

            $filter_data = array(
                'filter_category_id' => $category_id
            );

            $product_total = $this->model_catalog_product->getTotalProducts($filter_data);
            $products = $this->model_catalog_product->getProducts($filter_data);
            echo json_encode($products); die;

        } else {
            $this->response->setOutput(json_encode($error));
        }

    }

    // All Manufacturers Listing
    public function manufactureList() {

        $this->load->model('catalog/manufacturer');
        $this->load->model('tool/image');
        $error['fail'] = 'Failed';

        $manufactureList = array();

        if (isset($this->request->get['json'])) {
            $manufactureList = $this->model_catalog_manufacturer->getManufacturers();
            echo json_encode($manufactureList);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }
    }

    // Manufactur info Page
    public function manufactureInfo() {

        $this->load->model('catalog/manufacturer');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $error['fail'] = 'Failed';

        if (isset($this->request->get['manufacturer_id'])) {
            $manufactureInfo = $this->model_catalog_manufacturer->getManufacturer($manufacturer_id);
            echo json_encode($product_details);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }
    }


    // Category Listing Page
    public function specialProduct(){ 

        $specialProduct = array();
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $error['fail'] = 'Failed';

        if (isset($this->request->get['json'])) {
            $specialProduct = $this->model_catalog_product->getProductSpecials();
            echo json_encode($specialProduct);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }
    }


public function autocomplete() {
        $json = array();

        if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_model'])) {
            $this->load->model('catalog/product');
            $this->load->model('catalog/option');

            if (isset($this->request->get['filter_name'])) {
                $filter_name = $this->request->get['filter_name'];
            } else {
                $filter_name = '';
            }

            if (isset($this->request->get['filter_model'])) {
                $filter_model = $this->request->get['filter_model'];
            } else {
                $filter_model = '';
            }

            if (isset($this->request->get['limit'])) {
                $limit = $this->request->get['limit'];
            } else {
                $limit = 5;
            }

            $filter_data = array(
                'filter_name'  => $filter_name,
                'filter_model' => $filter_model,
                'start'        => 0,
                'limit'        => $limit
            );

            $results = $this->model_catalog_product->getProducts($filter_data);

            foreach ($results as $result) {
                $option_data = array();

                $product_options = $this->model_catalog_product->getProductOptions($result['product_id']);

                foreach ($product_options as $product_option) {
                    $option_info = $this->model_catalog_option->getOption($product_option['option_id']);

                    if ($option_info) {
                        $product_option_value_data = array();

                        foreach ($product_option['product_option_value'] as $product_option_value) {
                            $option_value_info = $this->model_catalog_option->getOptionValue($product_option_value['option_value_id']);

                            if ($option_value_info) {
                                $product_option_value_data[] = array(
                                    'product_option_value_id' => $product_option_value['product_option_value_id'],
                                    'option_value_id'         => $product_option_value['option_value_id'],
                                    'name'                    => $option_value_info['name'],
                                    'price'                   => (float)$product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
                                    'price_prefix'            => $product_option_value['price_prefix']
                                );
                            }
                        }

                        $option_data[] = array(
                            'product_option_id'    => $product_option['product_option_id'],
                            'product_option_value' => $product_option_value_data,
                            'option_id'            => $product_option['option_id'],
                            'name'                 => $option_info['name'],
                            'type'                 => $option_info['type'],
                            'value'                => $product_option['value'],
                            'required'             => $product_option['required']
                        );
                    }
                }

                $json[] = array(
                    'product_id' => $result['product_id'],
                    'name'       => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
                    'model'      => $result['model'],
                    'option'     => $option_data,
                    'price'      => $result['price']
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }



public function filterbyCategories(){
        $products = array();
        $this->load->language('catalog/product');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');


       if (isset($this->request->get['categoria'])){

    if (isset($this->request->get['categoria'])) {
                $filter_category_id = $this->request->get['categoria'];

            }

        $error[]['no_json']= "No JSON";

        $product_total = $this->model_catalog_product->getTotalProducts();
        $filter_data = array(
            'filter_category_id' => $filter_category_id,
        );

        $results = $this->model_catalog_product->getProducts($filter_data);
        foreach ($results as $result) {
            if (is_file(DIR_IMAGE . $result['image'])) {
                $image = $this->model_tool_image->resize($result['image'], 40, 40);
            } else {
                $image = $this->model_tool_image->resize('no_image.png', 40, 40);
            }
                
            $special = false;

            $product_specials = $this->model_catalog_product->getProductSpecials($result['product_id']);

            foreach ($product_specials  as $product_special) {
                //if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
                    $special = $product_special['price'];

                    //break;
               // }
            }
       
            $shop_products['shop_products'][] = array(
                'product_id' => $result['product_id'],
                'image'      => $image,
                'name'       => $result['name'],
                'descripcion'=>$result['description'],
                'model'      => $result['model'],
                'price'      => $result['price'],
                'special'    => $special,
                'quantity'   => $result['quantity'],
                'status'     => $result['status']
            );
        }

        if (isset($this->request->get['json'])) {
            echo json_encode($shop_products);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }  


    }else{
         $error[]['no_json']= "No se envio categoria";
        $this->response->setOutput(json_encode($error));
    }
    }





}