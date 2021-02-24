<?php
class ControllerApiAllproducts extends Controller
{
    private $error = array();

    // All Products
    public function index()
    {
        $products = array();
        $this
            ->load
            ->language('catalog/product');
        $this
            ->load
            ->model('catalog/product');
        $this
            ->load
            ->model('tool/image');

        $error[]['no_json'] = "No JSON";

        $product_total = $this
            ->model_catalog_product
            ->getTotalProducts();

        $results = $this
            ->model_catalog_product
            ->getProducts();

        foreach ($results as $result)
        {
            if (is_file(DIR_IMAGE . $result['image']))
            {

                $image = $this
                    ->model_tool_image
                    ->resize($result['image'], 150, 150);
                $image = $this
                    ->config
                    ->get('config_url') . 'image/' . $result['image'];
            }
            else
            {
                $image = $this
                    ->model_tool_image
                    ->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                
            }

            $special = false;

            $product_specials = $this
                ->model_catalog_product
                ->getProductSpecials($result['product_id']);

            foreach ($product_specials as $product_special)
            {
                //if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
                $special = $product_special['price'];

                //break;
                // }
                
            }

            $descripcion = strip_tags(html_entity_decode($result['description']));
            if (strlen($descripcion) >= 150)
            {
                $descripcion = substr($descripcion, 0, 150);
                $descripcion = $descripcion . '....';
            }

            $shop_products['shop_products'][] = array(
                'product_id' => $result['product_id'],
                'image' => $image,
                'name' => $result['name'],
                'descripcion' => $descripcion,
                'model' => $result['model'],
                'price' => $result['price'],
                'special' => $special,
                'quantity' => $result['quantity'],
                'status' => $result['status']
            );
        }

        if (isset($this
            ->request
            ->get['json']))
        {
            echo json_encode($shop_products);
            die;
        }
        else
        {
            $this
                ->response
                ->setOutput(json_encode($error));
        }
    }

    public function log()
    {
        $app = "no especifica";
        $archivo = "sin espeficicar";
        $linea = "sin especificar";
        $error = "Error sin especificar";
        $json = array();

        if (isset($this
            ->request
            ->post['app']))
        {
            $app = $this
                ->request
                ->post['app'];
        }

        if (isset($this
            ->request
            ->post['file']))
        {
            $archivo = $this
                ->request
                ->post['file'];
        }

        if (isset($this
            ->request
            ->post['error']))
        {
            $error = $this
                ->request
                ->post['error'];
        }

        if (isset($this
            ->request
            ->post['line']))
        {
            $linea = $this
                ->request
                ->post['line'];
        }

        //$this->log->write('MESSAGE HERE');
        $this
            ->log
            ->write("aplicacion " . $app . ' ERROR :' . $error . ' en ' . $archivo . ' en linea ' . $linea);

        $json['succes'] = "Operación Exitosa: log Guardado con exito";
        $json['log'] = "aplicacion " . $app . ' ERROR :' . $error . ' en ' . $archivo . ' en linea ' . $linea;

        $this
            ->response
            ->addHeader('Content-Type: application/json');
        $this
            ->response
            ->setOutput(json_encode($json));

    }

    // Product info Page
    public function productInfo()
    {
        $this
            ->load
            ->language('catalog/product');
        $this
            ->load
            ->model('catalog/product');
        $this
            ->load
            ->model('tool/image');

        $product_details = array();
        $error['fail'] = 'Failed';

        if (isset($this
            ->request
            ->get['product_id']))
        {
            //$product_details['product_id'] = $this->request->get['product_id'];
            $product_details = $this
                ->model_catalog_product
                ->getProduct($this
                ->request
                ->get['product_id']);

            if (empty($product_details))
            {
                $error['fail'] = ' id no existe producto';
                echo json_encode($error);
                die;
            }

            if (is_file(DIR_IMAGE . $product_details['image']))
            {

                $product_details['image'] = $this
                    ->config
                    ->get('config_url') . 'image/' . $product_details['image'];
            }
            else
            {
                $product_details['image'] = $this
                    ->model_tool_image
                    ->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                
            }

            if (is_file(DIR_IMAGE . $product_details['manufacturer_image']))
            {

                $product_details['manufacturer_image'] = $this
                    ->config
                    ->get('config_url') . 'image/' . $product_details['manufacturer_image'];
            }
            else
            {
                $product_details['manufacturer_image'] = $this
                    ->model_tool_image
                    ->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                $product_details['manufacturer_image'] = "";

            }

            $product_details['descripcion'] = $product_details['description'];
            $descripcion = $product_details['description'];
            if (strlen($descripcion) >= 150)
            {
                $descripcion = substr($descripcion, 0, 150);
                $descripcion = $descripcion . '....';
                $product_details['description'] = $descripcion;
                $product_details['descripcion'] = $descripcion;
            }

            $especificaciones = $this
                ->model_catalog_product
                ->getProductAttributes($this
                ->request
                ->get['product_id']);
            $product_details['atributes'] = $especificaciones;

            $imagenes = $this
                ->model_catalog_product
                ->getProductImages($this
                ->request
                ->get['product_id']);

            $images2 = [];
            if (isset($imagenes))
            {
                foreach ($imagenes as $key => $value)
                {

                    if (is_file(DIR_IMAGE . $value['image']))
                    {

                        $imagenes[$key]['image'] = $this
                            ->config
                            ->get('config_url') . 'image/' . $value['image'];
                        $value['image'] = $this
                            ->config
                            ->get('config_url') . 'image/' . $value['image'];
                    }
                    else
                    {
                        $images[$key]['image'] = $this
                            ->model_tool_image
                            ->resize('no_image.png', 150, 150);
                        $value['image'] = $images[$key]['image'] = $this
                            ->model_tool_image
                            ->resize('no_image.png', 150, 150);

                        //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                        
                    }

                    if ($value['sort_order'] != '99')
                    {

                        array_push($images2, $value);
                    }

                } //fin foreaach
                
            }

            array_push($images2, array(
                'product_image_id' => '01',
                'product_id' => $this
                    ->request
                    ->get['product_id'],
                'image' => $product_details['image'],
                'sort_order' => '1'
            ));

            $product_details['slider'] = $images2;

            $categoria = $this
                ->model_catalog_product
                ->getCategories($this
                ->request
                ->get['product_id']);
            $product_details['category_id'] = $categoria[0]['category_id'];

            $action = isset($categoria[1]['category_id']) ? $categoria[1]['category_id'] : $categoria[0]['category_id'];
            $categoria_image = $this
                ->model_catalog_product
                ->getCategoriesImages($action);

            if (isset($categoria_image))

            {
                if (is_file(DIR_IMAGE . $categoria_image['0']['image']))
                {

                    $categoria_image['0']['image'] = $this
                        ->config
                        ->get('config_url') . 'image/' . $categoria_image['0']['image'];
                }
                else
                {
                    $categoria_image['0']['image'] = $this
                        ->model_tool_image
                        ->resize('no_image.png', 150, 150);
                    //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                    
                }
            }

            $product_details['category_image'] = $categoria_image['0']['image'];

            $nameCat = $this
                ->model_catalog_product
                ->getCategoriesNames($categoria[0]['category_id']);
            $product_details['category_name'] = $nameCat[0]['name'];

            //echo json_encode($product_details);die;
            echo json_encode($product_details, JSON_HEX_QUOT | JSON_HEX_TAG);
            die;
        }
        else
        {
            $this
                ->response
                ->setOutput(json_encode($error));
        }
    }

    // Category Listing Page
    public function categories()
    {

        $shop_categories = array();
        $this
            ->load
            ->model('catalog/category');
        $this
            ->load
            ->model('tool/image');
        $error['fail'] = 'Failed';
        if (isset($this
            ->request
            ->get['parent']))
        {
            $parent_id = $this
                ->request
                ->get['parent'];

        }
        else
        {
            $parent_id = 0;
        }

        $asset = array();
        switch ($parent_id)
        {
            case '86':
                $asset = array();
                array_push($asset, array(
                    'image' => 'images/termotanques-solares.jpg',
                    'id' => '87'
                ));
                array_push($asset, array(
                    'image' => 'images/heap-pipe.jpg',
                    'id' => '88'
                ));

                array_push($asset, array(
                    'image' => 'images/accesorios-termica.jpg',
                    'id' => '89'
                ));

            break;

            case '90':
                $asset = array();
                array_push($asset, array(
                    'image' => 'images/paneles.jpg',
                    'id' => '91'
                ));
                array_push($asset, array(
                    'image' => 'images/inversores.jpg',
                    'id' => '92'
                ));

                array_push($asset, array(
                    'image' => 'images/fijaciones.jpg',
                    'id' => '93'
                ));

                array_push($asset, array(
                    'image' => 'images/accesorios-fotovoltaica.jpg',
                    'id' => '94'
                ));

            break;

            case '95':
                $asset = array();
                array_push($asset, array(
                    'image' => 'images/splits-tradicionales.jpg',
                    'id' => '96'
                ));
                array_push($asset, array(
                    'image' => 'images/splits-inverter.jpg',
                    'id' => '97'
                ));

                array_push($asset, array(
                    'image' => 'images/multi-split.jpg',
                    'id' => '98'
                ));

                array_push($asset, array(
                    'image' => 'images/piso-techo.jpg',
                    'id' => '99'
                ));

            break;

        }

        if (isset($this
            ->request
            ->get['json']))
        {
            $shop_categories = $this
                ->model_catalog_category
                ->getCategories($parent_id);
            $lista = array();
            foreach ($shop_categories as $key => $categories)
            {

                # code...
                if (is_file(DIR_IMAGE . $categories['image']))
                {

                    $image = $this
                        ->model_tool_image
                        ->resize($categories['image'], 150, 150);
                    $image = $this
                        ->config
                        ->get('config_url') . 'image/' . $categories['image'];
                }
                else
                {
                    $image = $this
                        ->model_tool_image
                        ->resize('no_image.png', 150, 150);
                    //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                    
                }

                switch ($parent_id)
                {
                    case '86':

                        if ($categories['category_id'] == '87')
                        {

                            $asset = 'images/termotanques-solares.jpg';
                        }
                        if ($categories['category_id'] == '88')
                        {

                            $asset = 'images/heap-pipe.jpg';
                        }

                        if ($categories['category_id'] == '89')
                        {

                            $asset = 'images/accesorios-termica.jpg';
                        }

                    break;

                    case '90':
                        if ($categories['category_id'] == '91')
                        {

                            $asset = 'images/paneles.jpg';
                        }
                        if ($categories['category_id'] == '92')
                        {

                            $asset = 'images/inversores.jpg';
                        }

                        if ($categories['category_id'] == '93')
                        {

                            $asset = 'images/fijaciones.jpg';
                        }

                        if ($categories['category_id'] == '94')
                        {

                            $asset = 'images/accesorios-fotovoltaica.jpg';
                        }
                    break;

                    case '95':
                        if ($categories['category_id'] == '96')
                        {

                            $asset = 'images/splits-tradicionales.jpg';
                        }

                        if ($categories['category_id'] == '97')
                        {

                            $asset = 'images/splits-inverter.jpg';
                        }

                        if ($categories['category_id'] == '98')
                        {

                            $asset = 'images/multi-split.jpg';
                        }

                        if ($categories['category_id'] == '99')
                        {

                            $asset = 'images/piso-techo.jpg';
                        }

                    break;

                    default:
                        $asset = '';

                }

                $shop_categories[$key]['image'] = $image;
                $shop_categories[$key]['image_asset'] = $asset;

                $shop_categories[$key]['description'] = strip_tags(html_entity_decode($categories['description']));

            }

            // $shop_categories[]['asset']= $asset;
            echo json_encode($shop_categories);
            die;
        }
        else
        {
            $this
                ->response
                ->setOutput(json_encode($error));
        }
    }

    // Product Listing By Category
    public function categoryList()
    {

        $this
            ->load
            ->model('catalog/category');
        $this
            ->load
            ->model('catalog/product');
        $this
            ->load
            ->model('tool/image');
        $error['fail'] = 'Failed';

        if (isset($this
            ->request
            ->get['path']))
        {
            $url = '';
            $path = '';
            $parts = explode('_', (string)$this
                ->request
                ->get['path']);

            $category_id = (int)array_pop($parts);

            foreach ($parts as $path_id)
            {
                if (!$path)
                {
                    $path = (int)$path_id;
                }
                else
                {
                    $path .= '_' . (int)$path_id;
                }

                $category_info = $this
                    ->model_catalog_category
                    ->getCategory($path_id);
            }
        }
        else
        {
            $category_id = 0;
        }

        $category_info = $this
            ->model_catalog_category
            ->getCategory($category_id);

        if ($category_info)
        {

            $url = '';
            //$data['categories'] = array();
            $results = $this
                ->model_catalog_category
                ->getCategories($category_id);

            foreach ($results as $result)
            {
                $filter_data = array(
                    'filter_category_id' => $result['category_id'],
                    'filter_sub_category' => true
                );

            }

            $products = array();

            $filter_data = array(
                'filter_category_id' => $category_id
            );

            $product_total = $this
                ->model_catalog_product
                ->getTotalProducts($filter_data);
            $products = $this
                ->model_catalog_product
                ->getProducts($filter_data);
            echo json_encode($products);
            die;

        }
        else
        {
            $this
                ->response
                ->setOutput(json_encode($error));
        }

    }

    // All Manufacturers Listing
    public function manufactureList()
    {

        $this
            ->load
            ->model('catalog/manufacturer');
        $this
            ->load
            ->model('tool/image');
        $error['fail'] = 'Failed';

        $manufactureList = array();

        if (isset($this
            ->request
            ->get['json']))
        {
            $manufactureList = $this
                ->model_catalog_manufacturer
                ->getManufacturers();
            echo json_encode($manufactureList);
            die;
        }
        else
        {
            $this
                ->response
                ->setOutput(json_encode($error));
        }
    }

    // Manufactur info Page
    public function manufactureInfo()
    {

        $this
            ->load
            ->model('catalog/manufacturer');
        $this
            ->load
            ->model('catalog/product');
        $this
            ->load
            ->model('tool/image');
        $error['fail'] = 'Failed';

        if (isset($this
            ->request
            ->get['manufacturer_id']))
        {
            $manufactureInfo = $this
                ->model_catalog_manufacturer
                ->getManufacturer($manufacturer_id);
            echo json_encode($product_details);
            die;
        }
        else
        {
            $this
                ->response
                ->setOutput(json_encode($error));
        }
    }

    // Category Listing Page
    public function specialProduct()
    {

        $specialProduct = array();
        $this
            ->load
            ->model('catalog/product');
        $this
            ->load
            ->model('tool/image');
        $error['fail'] = 'Failed';

        if (isset($this
            ->request
            ->get['json']))
        {
            $specialProduct = $this
                ->model_catalog_product
                ->getProductSpecials();
            echo json_encode($specialProduct);
            die;
        }
        else
        {
            $this
                ->response
                ->setOutput(json_encode($error));
        }
    }

    public function autocomplete()
    {
        $json = array();
        $this
            ->load
            ->model('tool/image');

        if (isset($this
            ->request
            ->get['filter_name']) || isset($this
            ->request
            ->get['filter_model']))
        {
            $this
                ->load
                ->model('catalog/product');
            $this
                ->load
                ->model('catalog/option');

            if (isset($this
                ->request
                ->get['filter_name']))
            {
                $filter_name = $this
                    ->request
                    ->get['filter_name'];
            }
            else
            {
                $filter_name = '';
            }

            if (isset($this
                ->request
                ->get['filter_category_id']))
            {
                $filter_category_id = $this
                    ->request
                    ->get['filter_category_id'];
            }
            else
            {
                $filter_category_id = '';
            }

            if (isset($this
                ->request
                ->get['filter_model']))
            {
                $filter_model = $this
                    ->request
                    ->get['filter_model'];
            }
            else
            {
                $filter_model = '';
            }

            if (isset($this
                ->request
                ->get['limit']))
            {
                $limit = $this
                    ->request
                    ->get['limit'];
            }
            else
            {
                $limit = 5;
            }

            $filter_data = array(
                'filter_name' => $filter_name,
                'filter_model' => $filter_model,
                'filter_category_id' => $filter_category_id,
                'start' => 0,
                'limit' => $limit
            );

            $results = $this
                ->model_catalog_product
                ->getProducts($filter_data);

            foreach ($results as $result)
            {
                $option_data = array();

                if (is_file(DIR_IMAGE . $result['manufacturer_image']))
                {

                    $image = $this
                        ->model_tool_image
                        ->resize($result['manufacturer_image'], 150, 150);
                    $result['manufacturer_image'] = $this
                        ->config
                        ->get('config_url') . 'image/' . $result['manufacturer_image'];
                }

                if (is_file(DIR_IMAGE . $result['image']))
                {

                    $image = $this
                        ->model_tool_image
                        ->resize($result['image'], 150, 150);
                    $image = $this
                        ->config
                        ->get('config_url') . 'image/' . $result['image'];
                }

                else
                {
                    $image = $this
                        ->model_tool_image
                        ->resize('no_image.png', 150, 150);
                    //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                    

                    
                }

                $product_options = $this
                    ->model_catalog_product
                    ->getProductOptions($result['product_id']);

                foreach ($product_options as $product_option)
                {
                    $option_info = $this
                        ->model_catalog_option
                        ->getOption($product_option['option_id']);

                    if ($option_info)
                    {
                        $product_option_value_data = array();

                        foreach ($product_option['product_option_value'] as $product_option_value)
                        {
                            $option_value_info = $this
                                ->model_catalog_option
                                ->getOptionValue($product_option_value['option_value_id']);

                            if ($option_value_info)
                            {
                                $product_option_value_data[] = array(
                                    'product_option_value_id' => $product_option_value['product_option_value_id'],
                                    'option_value_id' => $product_option_value['option_value_id'],
                                    'name' => $option_value_info['name'],
                                    'price' => (float)$product_option_value['price'] ? $this
                                        ->currency
                                        ->format($product_option_value['price'], $this
                                        ->config
                                        ->get('config_currency')) : false,
                                    'price_prefix' => $product_option_value['price_prefix']
                                );
                            }
                        }

                        $option_data[] = array(
                            'product_option_id' => $product_option['product_option_id'],
                            'product_option_value' => $product_option_value_data,
                            'option_id' => $product_option['option_id'],
                            'name' => $option_info['name'],
                            'type' => $option_info['type'],
                            'value' => $product_option['value'],
                            'required' => $product_option['required']
                        );
                    }
                }

                $json[] = array(
                    'product_id' => $result['product_id'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')) ,
                    'descripcion' => $result['description'],
                    'model' => $result['model'],
                    'option' => $option_data,
                    'manufacturer_image' => $result['manufacturer_image'],
                    'image' => $image,
                    'price' => $result['price']
                );
            }
        }

        $this
            ->response
            ->addHeader('Content-Type: application/json');
        $this
            ->response
            ->setOutput(json_encode($json));
    }

    public function filterbyCategories()
    {
        $products = array();
        $this
            ->load
            ->language('catalog/product');
        $this
            ->load
            ->model('catalog/product');
        $this
            ->load
            ->model('tool/image');

        if (isset($this
            ->request
            ->get['categoria']))
        {

            if (isset($this
                ->request
                ->get['categoria']))
            {
                $filter_category_id = $this
                    ->request
                    ->get['categoria'];

            }

            $error[]['no_json'] = "No JSON";

            $product_total = $this
                ->model_catalog_product
                ->getTotalProducts();
            $data = array(
                'filter_category_id' => $filter_category_id,
            );

            $results = $this
                ->model_catalog_product
                ->getProducts($data);

            foreach ($results as $result)
            {
                if (is_file(DIR_IMAGE . $result['image']))
                {

                    $image = $this
                        ->model_tool_image
                        ->resize($result['image'], 150, 150);
                    $image = $this
                        ->config
                        ->get('config_url') . 'image/' . $result['image'];
                }
                else
                {
                    $image = $this
                        ->model_tool_image
                        ->resize('no_image.png', 150, 150);
                    //$image=$this->config->get('config_url') . 'image/' .$product['image'];
                    

                    
                }

                $special = false;

                $product_specials = $this
                    ->model_catalog_product
                    ->getProductSpecials($result['product_id']);

                foreach ($product_specials as $product_special)
                {
                    //if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
                    $special = $product_special['price'];

                    //break;
                    // }
                    
                }

                $shop_products['shop_products'][] = array(
                    'product_id' => $result['product_id'],
                    'image' => $image,
                    'name' => $result['name'],
                    'descripcion' => $result['description'],
                    'model' => $result['model'],
                    'price' => $result['price'],
                    'special' => $special,
                    'quantity' => $result['quantity'],
                    'status' => $result['status']
                );
            }

            if (!isset($shop_products))
            {
                $shop_products['shop_products'] = array();
            }

            if (isset($this
                ->request
                ->get['json']))
            {
                echo json_encode($shop_products);
                die;
            }
            else
            {
                $this
                    ->response
                    ->setOutput(json_encode($error));
            }

        }
        else
        {
            $error[]['no_json'] = "No se envio categoria";
            $this
                ->response
                ->setOutput(json_encode($error));
        }
    }

    public function getUser()
    {
        $json = array();

        if (isset($this
            ->request
            ->get['filter_name']) || isset($this
            ->request
            ->get['filter_email']))
        {
            if (isset($this
                ->request
                ->get['filter_name']))
            {
                $filter_name = $this
                    ->request
                    ->get['filter_name'];
            }
            else
            {
                $filter_name = '';
            }

            if (isset($this
                ->request
                ->get['filter_email']))
            {
                $filter_email = $this
                    ->request
                    ->get['filter_email'];
            }
            else
            {
                $filter_email = '';
            }

            if (isset($this
                ->request
                ->get['filter_affiliate']))
            {
                $filter_affiliate = $this
                    ->request
                    ->get['filter_affiliate'];
            }
            else
            {
                $filter_affiliate = '';
            }

            $this
                ->load
                ->model('customer/customer');

            $filter_data = array(
                'filter_name' => $filter_name,
                'filter_email' => $filter_email,
                'filter_affiliate' => $filter_affiliate,
                'start' => 0,
                'limit' => 5
            );

            $results = $this
                ->model_customer_customer
                ->getCustomers($filter_data);

            foreach ($results as $result)
            {
                $json[] = array(
                    'customer_id' => $result['customer_id'],
                    'customer_group_id' => $result['customer_group_id'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')) ,
                    'customer_group' => $result['customer_group'],
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                    'email' => $result['email'],
                    'telephone' => $result['telephone'],
                    'custom_field' => json_decode($result['custom_field'], true) ,
                    'address' => $this
                        ->model_customer_customer
                        ->getAddresses($result['customer_id'])
                );
            }
        }

        $sort_order = array();

        foreach ($json as $key => $value)
        {
            $sort_order[$key] = $value['name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        $this
            ->response
            ->addHeader('Content-Type: application/json');
        $this
            ->response
            ->setOutput(json_encode($json));
    }

    public function closeSessions()
    {
         $this->load->model('checkout/order');
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        $json = array();

        if (isset($this
            ->request
            ->get['filter_name']) || isset($this
            ->request
            ->get['filter_email']))
        {
            if (isset($this
                ->request
                ->get['filter_name']))
            {
                $filter_name = $this
                    ->request
                    ->get['filter_name'];
            }
            else
            {
                $filter_name = '';
            }

            if (isset($this
                ->request
                ->get['filter_email']))
            {
                $filter_email = $this
                    ->request
                    ->get['filter_email'];
            }
            else
            {
                $filter_email = '';
            }

            if (isset($this
                ->request
                ->get['filter_affiliate']))
            {
                $filter_affiliate = $this
                    ->request
                    ->get['filter_affiliate'];
            }
            else
            {
                $filter_affiliate = '';
            }

            $this
                ->load
                ->model('customer/customer');

            $filter_data = array(
                'filter_name' => $filter_name,
                'filter_email' => $filter_email,
                'filter_affiliate' => $filter_affiliate,
                'start' => 0,
                'limit' => 1000
            );

            $results = $this
                ->model_customer_customer
                ->getCustomers($filter_data);

            foreach ($results as $result)
            {
                $json[] = array(
                    'customer_id' => $result['customer_id'],
                    'customer_group_id' => $result['customer_group_id'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')) ,
                    'customer_group' => $result['customer_group'],
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                    'email' => $result['email'],
                    'telephone' => $result['telephone'],
                    'custom_field' => json_decode($result['custom_field'], true) ,
                    'address' => $this
                        ->model_customer_customer
                        ->getAddresses($result['customer_id'])
                );

            } //fin foreach
            
        }

        $sort_order = array();

        foreach ($json as $key => $value)
        {
            $sort_order[$key] = $value['name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        foreach ($json as $key => $value)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => HTTP_SERVER . 'index.php?route=api/login',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 60,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "key=umQ7DYlMgq6BNHaNIoahpenzjIF0ipKCBlqF3r5Lfyqq5jyaQxScSBPTaMUePA5fjpFQahPkMJ04l7qZc7ERbYvzx35LTbO6Uc00IOdpJz6MmxZXGzpfHPRlOvtPlioHZ5k1HIFiETL0pVF1XETJLd0F6oR4JDFEDofJdiMGpMFD0wAGwWVf0XUY8uNZn5aNUQIzifvj5EZyRRQfcVgO3nYfpEEUDCzwt3WcyBDryQ8qQieaEgj8SX6R4yKWWdVA&username=demo&undefined=",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded",
                    "Postman-Token: 0ea14b5f-3ece-416b-bc87-03e9339321e8",
                    "cache-control: no-cache,no-cache",
                    "postman-token: 2ef6e7f4-84d1-28ae-84b0-ae2dcebeab2f"
                ) ,
            ));

            $response1 = curl_exec($curl);
            $err = curl_error($curl);
            echo curl_close($curl);

            if ($err)
            {
                echo "cURL Error #:" . $err;
            }
            else
            {
                $json1 = json_decode($response1, true);
                var_dump($json1['api_token']);
                //incio de session
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => HTTP_SERVER . "index.php?route=api/customer&api_token=" . $json1['api_token'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "firstname=" . $value['firstname'] . "&lastname=" . $value['lastname'] . "&email=" . $value['email'] . "&telephone=" . $value['telephone'] . "&customer_id=" . $value['customer_id'] . "",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/x-www-form-urlencoded",
                        "Postman-Token: c92d0315-1872-471e-848e-43a4d18e7725",
                        "cache-control: no-cache"
                    ) ,
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err)
                {
                    echo "cURL Error #:" . $err;
                }
                else
                {
                    echo $response;
                    echo "-------------------------asigna session-------------------------";
                    sleep(3);

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => HTTP_SERVER . "index.php?route=api/shipping/address&api_token=" . $json1['api_token'],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"firstname\"\r\n\r\n" . $value['firstname'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"lastname\"\r\n\r\n" . $value['lastname'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"address_1\"\r\n\r\njujuy\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"city\"\r\n\r\nsan salvador de jujuy\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"country_id\"\r\n\r\n10\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"zone_id\"\r\n\r\n165\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                        CURLOPT_HTTPHEADER => array(
                            "Postman-Token: 5c07f5fa-c148-49aa-9197-6d93ec27b2ed",
                            "cache-control: no-cache",
                            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                        ) ,
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err)
                    {
                        echo "cURL Error #:" . $err;
                    }
                    else
                    {
                        //echo $response;
                        echo '------------------1 carga direccion--------------------';
                        sleep(3);

                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => HTTP_SERVER . "index.php?route=api/payment/address&api_token=" . $json1['api_token'],
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"firstname\"\r\n\r\n" . $value['firstname'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"lastname\"\r\n\r\n" . $value['lastname'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"address_1\"\r\n\r\njujuy\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"city\"\r\n\r\nsan salvador de jujuy\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"country_id\"\r\n\r\n10\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"zone_id\"\r\n\r\n165\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                            CURLOPT_HTTPHEADER => array(
                                "Postman-Token: c49b8a28-aa9e-4c26-9113-59ebaa81f71b",
                                "cache-control: no-cache",
                                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                            ) ,
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err)
                        {
                            echo "cURL Error #:" . $err;
                        }
                        else
                        {
                            //  echo $response;
                            echo '---------------------- 2 carga direccion de pago----------------';
                            sleep(3);

                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                                CURLOPT_URL => HTTP_SERVER . "index.php?route=api/shipping/methods&api_token=" . $json1['api_token'],
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_HTTPHEADER => array(
                                    "Postman-Token: 962521b3-8158-4753-af4a-ca525d1a980f",
                                    "cache-control: no-cache"
                                ) ,
                            ));

                            $response = curl_exec($curl);
                            $err = curl_error($curl);

                            curl_close($curl);

                            if ($err)
                            {
                                echo "cURL Error #:" . $err;
                            }
                            else
                            {
                                // echo $response;
                                echo '----------------------3 obtengo metodos de envio----------------';
                                sleep(3);

                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => HTTP_SERVER . "index.php?route=api/shipping/method&api_token=" . $json1['api_token'],
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "POST",
                                    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"shipping_method\"\r\n\r\nfree.free\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--", //cambiar por free.free
                                    CURLOPT_HTTPHEADER => array(
                                        "Postman-Token: 2a8bf177-fb09-4b8c-bfc2-4d5aaa736cfe",
                                        "cache-control: no-cache",
                                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                                    ) ,
                                ));

                                $response = curl_exec($curl);
                                $err = curl_error($curl);

                                curl_close($curl);

                                if ($err)
                                {
                                    echo "cURL Error #:" . $err;
                                }
                                else
                                {
                                    //echo $response;
                                    echo '----------------------4  cargo de envio----------------';
                                    sleep(3);

                                    $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => HTTP_SERVER . "index.php?route=api/payment/methods&api_token=" . $json1['api_token'],
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => "",
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 30,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => "POST",
                                        CURLOPT_POSTFIELDS => "",
                                        CURLOPT_HTTPHEADER => array(
                                            "Postman-Token: f8744aa2-af06-479b-bbb2-bc81e69a4c11",
                                            "cache-control: no-cache"
                                        ) ,
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err)
                                    {
                                        echo "cURL Error #:" . $err;
                                    }
                                    else
                                    {
                                        //echo $response;
                                        echo '----------------------5  obtengo medios de pago----------------';
                                        sleep(3);
                                    }

                                    $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => HTTP_SERVER.'index.php?route=api/payment/method&api_token=' . $json1['api_token'],
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => "",
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 30,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => "POST",
                                        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"payment_method\"\r\n\r\ncod\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                        CURLOPT_HTTPHEADER => array(
                                            "Postman-Token: ea58755c-5a14-4a73-b5e6-eb8e1b2016d1",
                                            "cache-control: no-cache",
                                            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                                        ) ,
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err)
                                    {
                                        echo "cURL Error #:" . $err;
                                    }
                                    else
                                    {
                                        // echo $response;
                                        echo '----------------------6  cargo medios de pago----------------';
                                        sleep(3);

                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                            CURLOPT_URL => HTTP_SERVER . "index.php?route=api/order/add&api_token=" . $json1['api_token'],
                                            CURLOPT_RETURNTRANSFER => true,
                                            CURLOPT_ENCODING => "",
                                            CURLOPT_MAXREDIRS => 10,
                                            CURLOPT_TIMEOUT => 30,
                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                            CURLOPT_CUSTOMREQUEST => "POST",
                                            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"order_status_id\"\r\n\r\n2\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                            CURLOPT_HTTPHEADER => array(
                                                "Postman-Token: b3f3aec6-545d-4d0b-b5bc-212ed2e508ce",
                                                "cache-control: no-cache"
                                            ) ,
                                        ));

                                        $response = curl_exec($curl);
                                        $err = curl_error($curl);

                                        curl_close($curl);

                                        if ($err)
                                        {
                                            echo "cURL Error #:" . $err;
                                        }
                                        else
                                        {
                                            echo $response;

                                            echo '---------------------- 7 finalizo perdido----------------';
                                            $json2 = json_decode($response, true);
                                           // {"success":"Operaci\u00f3n Exitosa: Pedidos Modificados.","order_id":386}
                                            if (isset($json2['order_id']))
                                            {
                                              $this->model_checkout_order->changeStatus($json2['order_id']);
                                            }
                                            var_dump($json2);




                                            unset($this->session->data['customer']);
                                            
                                            unset($this->session->data['shipping_address']);
                                            //unset($this->session->data['customer']);
                                            unset($this->session->data['shipping_method']);
                                            unset($this->session->data['shipping_methods']);
                                            unset($this->session->data['payment_address']);
                                            unset($this->session->data['payment_method']);
                                            unset($this->session->data['payment_methods']);
                                            unset($this->session->data['comment']);
                                            unset($this->session->data['order_id']);
                                            unset($this->session->data['coupon']);
                                            unset($this->session->data['reward']);
                                            unset($this->session->data['voucher']);
                                            unset($this->session->data['vouchers']);

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        } // fin foreach
        

        $this
            ->response
            ->addHeader('Content-Type: application/json');
        // $this
        //     ->response
        //     ->setOutput(json_encode($json));
        

        
    }

}

