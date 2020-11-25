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
}