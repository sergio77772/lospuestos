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

            
                $image = $this->model_tool_image->resize($result['image'], 150, 150);
                $image=$this->config->get('config_url') . 'image/' .$result['image'];
           } else {
                $image = $this->model_tool_image->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
            }
                
            $special = false;

            $product_specials = $this->model_catalog_product->getProductSpecials($result['product_id']);

            foreach ($product_specials  as $product_special) {
                //if (($product_special['date_start'] == '0000-00-00' || strtotime($product_special['date_start']) < time()) && ($product_special['date_end'] == '0000-00-00' || strtotime($product_special['date_end']) > time())) {
                    $special = $product_special['price'];

                    //break;
               // }
            }
       
$descripcion=strip_tags(html_entity_decode($result['description']));
if (strlen($descripcion)>=150){
$descripcion=substr($descripcion, 0, 150);
$descripcion=$descripcion.'....';
}

            $shop_products['shop_products'][] = array(
                'product_id' => $result['product_id'],
                'image'      => $image,
                'name'       => $result['name'],
				'descripcion'=>$descripcion,
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





public function log()
{
    $app="no especifica";
    $archivo="sin espeficicar";
    $linea="sin especificar";
    $error="Error sin especificar";
$json=array();

if(isset($this->request->post['app']))
{
    $app=$this->request->post['app'];
}


if(isset($this->request->post['file']))
{
    $archivo=$this->request->post['file'];
}


if(isset($this->request->post['error']))
{
    $error=$this->request->post['error'];
}


if(isset($this->request->post['line']))
{
    $linea=$this->request->post['line'];
}



//$this->log->write('MESSAGE HERE');
$this->log->write("aplicacion ".$app. ' ERROR :' . $error . ' en ' . $archivo . ' en linea ' . $linea);

   $json['succes'] ="Operación Exitosa: log Guardado con exito";
   $json['log']="aplicacion ".$app. ' ERROR :' . $error . ' en ' . $archivo . ' en linea ' . $linea;

$this->response->addHeader('Content-Type: application/json');
$this->response->setOutput(json_encode($json));


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
              
            if (empty($product_details))
            {
            $error['fail'] = ' id no existe producto';
            echo json_encode($error);die;
            }


              if (is_file(DIR_IMAGE . $product_details['image'])) {

               $product_details['image']=$this->config->get('config_url') . 'image/' .$product_details['image'];
           } else {
               $product_details['image'] = $this->model_tool_image->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
            }

            $product_details['descripcion']=$product_details['description'];
$descripcion=$product_details['description'];
if (strlen($descripcion)>=150){
$descripcion=substr($descripcion, 0, 150);
$descripcion=$descripcion.'....';
$product_details['description']=$descripcion;
$product_details['descripcion']=$descripcion;
}



            $especificaciones =$this->model_catalog_product->getProductAttributes($this->request->get['product_id']);
             $product_details['atributes']=$especificaciones;

             $imagenes=$this->model_catalog_product->getProductImages($this->request->get['product_id']);

             if (isset($imagenes)){
             foreach ($imagenes as $key => $value) {

          if (is_file(DIR_IMAGE . $value['image'])) {

                $imagenes[$key]['image']=$this->config->get('config_url') . 'image/' .$value['image'];
           } else {
                $images[$key]['image'] = $this->model_tool_image->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
            }


                    
                    }
                }

                array_push($imagenes,array(
                'product_image_id'=>'01',
                'product_id'=>$this->request->get['product_id'],
                'image'=>$product_details['image'],
                'sort_order'=>'1'
                ));

             $product_details['slider']=$imagenes;

             $categoria=$this->model_catalog_product->getCategories($this->request->get['product_id']);
             $product_details['category_id']=$categoria[0]['category_id'];

              $categoria_image=$this->model_catalog_product->getCategoriesImages($categoria[0]['category_id']);

              if (isset( $categoria_image)){
              if (is_file(DIR_IMAGE .  $categoria_image['0']['image'])) {

                $categoria_image['0']['image']=$this->config->get('config_url') . 'image/' .$categoria_image['0']['image'];
           } else {
                $categoria_image['0']['image'] = $this->model_tool_image->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
            }
                }



              $product_details['category_image']=$categoria_image['0']['image'];


             $nameCat=$this->model_catalog_product->getCategoriesNames($categoria[0]['category_id']);
             $product_details['category_name']=$nameCat[0]['name'];

            //echo json_encode($product_details);die;
           echo json_encode($product_details, JSON_HEX_QUOT | JSON_HEX_TAG);die;
        } else {
            $this->response->setOutput(json_encode($error));
        }
    }









    // Category Listing Page
public function categories(){ 

        $shop_categories = array();
        $this->load->model('catalog/category');
        $this->load->model('tool/image');
        $error['fail'] = 'Failed';
if (isset($this->request->get['parent'])) {
   $parent_id=$this->request->get['parent'];
    
}
else
{
   $parent_id=0;
}


 $asset= array();
switch ($parent_id) {
    case '86':
    $asset= array();
        array_push ($asset,array(
         'image'=>'images/termontaques-solares.jpg',
         'id'=>'87'
        ));
 array_push ($asset,array(
         'image'=>'images/heap-pipe.jpg',
         'id'=>'88'
        ));

 array_push ($asset,array(
         'image'=>'images/accesorios-termica.jpg',
         'id'=>'89'
        ));

        break;

case '90':
    $asset= array();
        array_push ($asset,array(
         'image'=>'images/paneles.jpg',
         'id'=>'91'
        ));
 array_push ($asset,array(
         'image'=>'images/inversores.jpg',
         'id'=>'92'
        ));

 array_push ($asset,array(
         'image'=>'images/fijaciones.jpg',
         'id'=>'93'
        ));

 array_push ($asset,array(
         'image'=>'images/accesorios-fotovoltaica.jpg',
         'id'=>'94'
        ));

        break;

case '95':
    $asset= array();
        array_push ($asset,array(
         'image'=>'images/splits-tradicionales.jpg',
         'id'=>'96'
        ));
 array_push ($asset,array(
         'image'=>'images/splits-inverter.jpg',
         'id'=>'97'
        ));

 array_push ($asset,array(
         'image'=>'images/multi-split.jpg',
         'id'=>'98'
        ));

 array_push ($asset,array(
         'image'=>'images/piso-techo.jpg',
         'id'=>'99'
        ));

        break;

}



        if (isset($this->request->get['json'])) {
            $shop_categories =$this->model_catalog_category->getCategories($parent_id);
          $lista=array();
              foreach ($shop_categories as $key => $categories) {
                  # code...
                   if (is_file(DIR_IMAGE . $categories['image'])) {

            
                $image = $this->model_tool_image->resize($categories['image'], 150, 150);
                $image=$this->config->get('config_url') . 'image/' .$categories['image'];
           } else {
                $image = $this->model_tool_image->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];
            }

            $shop_categories[$key]['image']= $image;

            $shop_categories[$key]['description']= strip_tags(html_entity_decode($categories['description']));

              }

            $shop_categories[]['asset']= $asset;

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
         $this->load->model('tool/image');

        if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_model'])) {
            $this->load->model('catalog/product');
            $this->load->model('catalog/option');

            if (isset($this->request->get['filter_name'])) {
                $filter_name = $this->request->get['filter_name'];
            } else {
                $filter_name = '';
            }

         if (isset($this->request->get['filter_category_id'])) {
                $filter_category_id = $this->request->get['filter_category_id'];
            } else {
                $filter_category_id = '';
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
                'filter_category_id'=>$filter_category_id,
                'start'        => 0,
                'limit'        => $limit
            );

            $results = $this->model_catalog_product->getProducts($filter_data);

            foreach ($results as $result) {
                $option_data = array();

                 if (is_file(DIR_IMAGE . $result['image'])) {

            
                $image = $this->model_tool_image->resize($result['image'], 150, 150);
                $image=$this->config->get('config_url') . 'image/' .$result['image'];
           } else {
                $image = $this->model_tool_image->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];


            }

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
                    'descripcion'=>$result['description'],
                    'model'      => $result['model'],
                    'option'     => $option_data,
                    'image'=>$image,
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
        $data = array(
            'filter_category_id' => $filter_category_id,
        );

        $results = $this->model_catalog_product->getProducts($data);

        foreach ($results as $result) {
             if (is_file(DIR_IMAGE . $result['image'])) {

            
                $image = $this->model_tool_image->resize($result['image'], 150, 150);
                $image=$this->config->get('config_url') . 'image/' .$result['image'];
           } else {
                $image = $this->model_tool_image->resize('no_image.png', 150, 150);
                //$image=$this->config->get('config_url') . 'image/' .$product['image'];


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

         if (!isset($shop_products)) {
            $shop_products['shop_products']=array();
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


public function getUser() {
        $json = array();

        if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_email'])) {
            if (isset($this->request->get['filter_name'])) {
                $filter_name = $this->request->get['filter_name'];
            } else {
                $filter_name = '';
            }

            if (isset($this->request->get['filter_email'])) {
                $filter_email = $this->request->get['filter_email'];
            } else {
                $filter_email = '';
            }
            
            if (isset($this->request->get['filter_affiliate'])) {
                $filter_affiliate = $this->request->get['filter_affiliate'];
            } else {
                $filter_affiliate = '';
            }
            
            $this->load->model('customer/customer');

            $filter_data = array(
                'filter_name'      => $filter_name,
                'filter_email'     => $filter_email,
                'filter_affiliate' => $filter_affiliate,
                'start'            => 0,
                'limit'            => 5
            );

            $results = $this->model_customer_customer->getCustomers($filter_data);

            foreach ($results as $result) {
                $json[] = array(
                    'customer_id'       => $result['customer_id'],
                    'customer_group_id' => $result['customer_group_id'],
                    'name'              => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
                    'customer_group'    => $result['customer_group'],
                    'firstname'         => $result['firstname'],
                    'lastname'          => $result['lastname'],
                    'email'             => $result['email'],
                    'telephone'         => $result['telephone'],
                    'custom_field'      => json_decode($result['custom_field'], true),
                    'address'           => $this->model_customer_customer->getAddresses($result['customer_id'])
                );
            }
        }

        $sort_order = array();

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }


}