<?php
class ControllerCatalogCategory extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_category->addCategory($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_category->editCategory($this->request->get['category_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

$file=DIR_APPLICATION;
$file= str_replace('admin', 'json', $file);
$base_url=HTTP_SERVER;
$base_url=str_replace('/admin', '', $base_url);
$tit=$this->request->post['category_description'][2]['name'];
$sub=strip_tags(html_entity_decode($this->request->post['category_description'][2]['description']));
if ($this->request->get['category_id']==75){
@unlink($file.'climatizacion/appconfig.json');
$d=array (
  'app_activity' => 5,
  'base_url' => $base_url,
  'assets' => 
  array (
    0 => 
    array (
      'name' => 'app_logo',
      'value' => 'assets/images/logo.png',
    ),
    1 => 
    array (
      'name' => 'app_no_image',
      'value' => 'assets/img/no-image.jpg',
    ),
    2 => 
    array (
      'name' => 'home_background',
      'value' => 'assets/images/home.gif',
    ),
    3 => 
    array (
      'name' => 'menu_categories_background',
      'value' => 'assets/images/category_background.gif',
    ),
    4 => 
    array (
      'name' => 'product_background',
      'value' => 'images/fondo-pantalla.png',
    ),
    5 => 
    array (
      'name' => 'product_detail_background',
      'value' => 'assets/images/ambient.gif',
    ),
    6 => 
    array (
      'name' => 'cart_background',
      'value' => 'assets/images/barra-superior.jpg',
    ),
  ),
  'routes' => 
  array (
    0 => 
    array (
      'route_name' => 'login_url',
      'value' => 'index.php?route=api%2Flogin',
    ),
    1 => 
    array (
      'route_name' => 'url_get_categories',
      'value' => 'index.php?route=api/allproducts/categories&json&parent=',
    ),
    2 => 
    array (
      'route_name' => 'products_filter_by_category',
      'value' => 'index.php?route=api/allproducts/filterbyCategories&categoria=',
    ),
    3 => 
    array (
      'route_name' => 'get_product_by_id',
      'value' => 'index.php?route=api/allproducts/productInfo&json&product_id=',
    ),
    4 => 
    array (
      'route_name' => 'search_product',
      'value' => '/index.php?route=api/allproducts/autocomplete&filter_name=',
    ),
    5 => 
    array (
      'route_name' => 'register_url',
      'value' => 'index.php?route=account/register',
    ),
    6 => 
    array (
      'route_name' => 'get_user_url',
      'value' => 'index.php?route=api/allproducts/getuser&filter_email=',
    ),
    7 => 
    array (
      'route_name' => 'asign_token',
      'value' => 'index.php?route=api/customer&api_token=',
    ),
    8 => 
    array (
      'route_name' => 'close_session',
      'value' => 'index.php?route=api/customer/close&api_token=',
    ),
    9 => 
    array (
      'route_name' => 'add_product',
      'value' => 'index.php?route=api/cart/add&api_token=',
    ),
    10 => 
    array (
      'route_name' => 'get_cart',
      'value' => 'index.php?route=api%2Fcart%2Fproducts&api_token=',
    ),
    11 => 
    array (
      'route_name' => 'delete_cart_item',
      'value' => 'index.php?route=api/cart/remove&api_token=',
    ),
    12 => 
    array (
      'route_name' => 'update_cart_item',
      'value' => 'index.php?route=api/cart/edit&api_token=',
    ),
    13 => 
    array (
      'route_name' => 'set_checkout',
      'value' => 'index.php?route=api/shipping/address&api_token=',
    ),
    14 => 
    array (
      'route_name' => 'set_payment_address',
      'value' => 'index.php?route=api/payment/address&api_token=',
    ),
    15 => 
    array (
      'route_name' => 'get_shipping',
      'value' => 'index.php?route=api/shipping/methods&api_token=',
    ),
    16 => 
    array (
      'route_name' => 'set_shipping',
      'value' => 'index.php?route=api/shipping/method&api_token=',
    ),
    17 => 
    array (
      'route_name' => 'get_payment',
      'value' => 'index.php?route=api/payment/methods&api_token=',
    ),
    18 => 
    array (
      'route_name' => 'set_payment',
      'value' => 'index.php?route=api/payment/method&api_token=',
    ),
    19 => 
    array (
      'route_name' => 'add_order',
      'value' => 'index.php?route=api/order/add&api_token=',
    ),
  ),
  'attributes' => 
  array (
    0 => 
    array (
      'app_id' => 75,
      'banners' => 
      array (
        0 => 
        array (
          'component' => 'app_title',
          'text' => $tit,
        ),
        1 => 
        array (
          'component' => 'app_subtitle',
          'text' => $sub,
        ),
      ),
      'components' => 
      array (
        0 => 
        array (
          'component' => 'route_info',
          'text' => '',
          'color' => '#BBC3EA',
        ),
        1 => 
        array (
          'component' => 'button_add_product',
          'text' => '+ Agregar a cotización',
          'color' => '#596489',
        ),
        2 => 
        array (
          'component' => 'button_register',
          'text' => 'SEGUIR VIENDO PRODUCTOS',
          'color' => '#BBC3EA',
        ),
        3 => 
        array (
          'component' => 'button_continue',
          'text' => ' Continuar en otra pantalla',
          'color' => '#596489',
        ),
        4 => 
        array (
          'component' => 'button_search_product',
          'text' => '',
          'color' => '#DFFDFF',
        ),
        5 => 
        array (
          'component' => 'button_shopping_cart',
          'text' => '',
          'color' => '#DFFDFF',
        ),
        6 => 
        array (
          'component' => 'button_product_more_details',
          'text' => 'Detalles técnicos',
          'color' => '#596489',
        ),
        7 => 
        array (
          'component' => 'button_back_to_details',
          'text' => '<< Volver a detalles',
          'color' => '#596489',
        ),
        8 => 
        array (
          'component' => 'button_finish_quotation',
          'text' => 'Finalizar cotización',
          'color' => '#596489',
        ),
        9 => 
        array (
          'component' => 'button_finish_session',
          'text' => 'Finalizar Sesion',
          'color' => '#596489',
        ),
        10 => 
        array (
          'component' => 'button_close_more_details',
          'text' => 'Cerrar',
          'color' => '#596489',
        ),
        11 => 
        array (
          'component' => 'button_back_to_menu',
          'text' => 'Menú',
          'color' => '#FFFFFF',
        ),
        12 => 
        array (
          'component' => 'button_found_product',
          'text' => 'Ver mas detalles',
          'color' => '#BBC3EA',
        ),
        13 => 
        array (
          'component' => 'atributes_title',
          'text' => '',
          'color' => '#BBC3EA',
        ),
        14 => 
        array (
          'component' => 'slider_more_products',
          'text' => '',
          'color' => '#596489',
        ),
        15 => 
        array (
          'component' => 'cart_product_bg_light',
          'text' => '',
          'color' => '#F5F6FF',
        ),
        16 => 
        array (
          'component' => 'cart_product_bg_dark',
          'text' => '',
          'color' => '#D5F2FF',
        ),
        17 => 
        array (
          'component' => 'user_form_acount_aviable',
          'text' => 'YA TENGO CUENTA',
          'color' => '',
        ),
        18 => 
        array (
          'component' => 'user_menu_home',
          'text' => 'Categorías',
          'color' => '',
        ),
        19 => 
        array (
          'component' => 'user_menu_close_session',
          'text' => 'Cerrar Sesión',
          'color' => '',
        ),
        20 => 
        array (
          'component' => 'user_menu_cart',
          'text' => 'Mi Cotización',
          'color' => '',
        ),
        21 => 
        array (
          'component' => 'user_menu_back',
          'text' => 'Volver',
          'color' => '',
        ),
      ),
    ),
  ),
);

$DescriptorFichero = fopen($file.'climatizacion/appconfig.json', "w");
$string1           =json_encode($d);
fputs($DescriptorFichero, $string1);
fclose($DescriptorFichero);
}

if ($this->request->get['category_id']==90){
@unlink($file.'fotovoltaica/appconfig.json');
$d=	array (
  'app_activity' => 5,
  'base_url' => $base_url,
  'assets' => 
  array (
    0 => 
    array (
      'name' => 'app_logo',
      'value' => 'assets/images/logo.png',
    ),
    1 => 
    array (
      'name' => 'app_no_image',
      'value' => 'assets/img/no-image.jpg',
    ),
    2 => 
    array (
      'name' => 'home_background',
      'value' => 'assets/images/home.gif',
    ),
    3 => 
    array (
      'name' => 'menu_categories_background',
      'value' => 'assets/images/category_background.gif',
    ),
    4 => 
    array (
      'name' => 'product_background',
      'value' => 'images/fondo-pantalla.png',
    ),
    5 => 
    array (
      'name' => 'product_detail_background',
      'value' => 'assets/images/ambient.gif',
    ),
    6 => 
    array (
      'name' => 'cart_background',
      'value' => 'assets/images/barra-superior.jpg',
    ),
  ),
  'routes' => 
  array (
    0 => 
    array (
      'route_name' => 'login_url',
      'value' => 'index.php?route=api%2Flogin',
    ),
    1 => 
    array (
      'route_name' => 'url_get_categories',
      'value' => 'index.php?route=api/allproducts/categories&json&parent=',
    ),
    2 => 
    array (
      'route_name' => 'products_filter_by_category',
      'value' => 'index.php?route=api/allproducts/filterbyCategories&categoria=',
    ),
    3 => 
    array (
      'route_name' => 'get_product_by_id',
      'value' => 'index.php?route=api/allproducts/productInfo&json&product_id=',
    ),
    4 => 
    array (
      'route_name' => 'search_product',
      'value' => '/index.php?route=api/allproducts/autocomplete&filter_name=',
    ),
    5 => 
    array (
      'route_name' => 'register_url',
      'value' => 'index.php?route=account/register',
    ),
    6 => 
    array (
      'route_name' => 'get_user_url',
      'value' => 'index.php?route=api/allproducts/getuser&filter_email=',
    ),
    7 => 
    array (
      'route_name' => 'asign_token',
      'value' => 'index.php?route=api/customer&api_token=',
    ),
    8 => 
    array (
      'route_name' => 'close_session',
      'value' => 'index.php?route=api/customer/close&api_token=',
    ),
    9 => 
    array (
      'route_name' => 'add_product',
      'value' => 'index.php?route=api/cart/add&api_token=',
    ),
    10 => 
    array (
      'route_name' => 'get_cart',
      'value' => 'index.php?route=api%2Fcart%2Fproducts&api_token=',
    ),
    11 => 
    array (
      'route_name' => 'delete_cart_item',
      'value' => 'index.php?route=api/cart/remove&api_token=',
    ),
    12 => 
    array (
      'route_name' => 'update_cart_item',
      'value' => 'index.php?route=api/cart/edit&api_token=',
    ),
    13 => 
    array (
      'route_name' => 'set_checkout',
      'value' => 'index.php?route=api/shipping/address&api_token=',
    ),
    14 => 
    array (
      'route_name' => 'set_payment_address',
      'value' => 'index.php?route=api/payment/address&api_token=',
    ),
    15 => 
    array (
      'route_name' => 'get_shipping',
      'value' => 'index.php?route=api/shipping/methods&api_token=',
    ),
    16 => 
    array (
      'route_name' => 'set_shipping',
      'value' => 'index.php?route=api/shipping/method&api_token=',
    ),
    17 => 
    array (
      'route_name' => 'get_payment',
      'value' => 'index.php?route=api/payment/methods&api_token=',
    ),
    18 => 
    array (
      'route_name' => 'set_payment',
      'value' => 'index.php?route=api/payment/method&api_token=',
    ),
    19 => 
    array (
      'route_name' => 'add_order',
      'value' => 'index.php?route=api/order/add&api_token=',
    ),
  ),
  'attributes' => 
  array (
    0 => 
    array (
      'app_id' => 90,
      'banners' => 
      array (
        0 => 
        array (
          'component' => 'app_title',
          'text' => $tit,
        ),
        1 => 
        array (
          'component' => 'app_subtitle',
          'text' => $sub,
        ),
      ),
      'components' => 
      array (
        0 => 
        array (
          'component' => 'route_info',
          'text' => '',
          'color' => '#D79543',
        ),
        1 => 
        array (
          'component' => 'button_add_product',
          'text' => '+ Agregar a cotización',
          'color' => '#C19348',
        ),
        2 => 
        array (
          'component' => 'button_register',
          'text' => 'SEGUIR VIENDO PRODUCTOS',
          'color' => '#E8C0CE',
        ),
        3 => 
        array (
          'component' => 'button_continue',
          'text' => ' Continuar en otra pantalla',
          'color' => '#C19348',
        ),
        4 => 
        array (
          'component' => 'button_search_product',
          'text' => '',
          'color' => '#E9BE85',
        ),
        5 => 
        array (
          'component' => 'button_shopping_cart',
          'text' => '',
          'color' => '#E8E592',
        ),
        6 => 
        array (
          'component' => 'button_product_more_details',
          'text' => 'Detalles técnicos',
          'color' => '#C19348',
        ),
        7 => 
        array (
          'component' => 'button_back_to_details',
          'text' => '<< Volver a detalles',
          'color' => '#C19348',
        ),
        8 => 
        array (
          'component' => 'button_finish_quotation',
          'text' => 'Finalizar cotización',
          'color' => '#C19348',
        ),
        9 => 
        array (
          'component' => 'button_finish_session',
          'text' => 'Finalizar Sesión',
          'color' => '#C19348',
        ),
        10 => 
        array (
          'component' => 'button_close_more_details',
          'text' => 'Cerrar',
          'color' => '#C19348',
        ),
        11 => 
        array (
          'component' => 'button_back_to_menu',
          'text' => 'Menú',
          'color' => '#E8C078',
        ),
        12 => 
        array (
          'component' => 'button_found_product',
          'text' => 'Ver mas detalles',
          'color' => '#E8C0CE',
        ),
        13 => 
        array (
          'component' => 'atributes_title',
          'text' => '',
          'color' => '#D79543',
        ),
        14 => 
        array (
          'component' => 'slider_more_products',
          'text' => '',
          'color' => '#C19348',
        ),
        15 => 
        array (
          'component' => 'cart_product_bg_light',
          'text' => '',
          'color' => '#F9F7E4',
        ),
        16 => 
        array (
          'component' => 'cart_product_bg_dark',
          'text' => '',
          'color' => '#FDE0D4',
        ),
        17 => 
        array (
          'component' => 'user_form_acount_aviable',
          'text' => 'YA TENGO CUENTA',
          'color' => '',
        ),
        18 => 
        array (
          'component' => 'user_menu_home',
          'text' => 'Categorías',
          'color' => '',
        ),
        19 => 
        array (
          'component' => 'user_menu_close_session',
          'text' => 'Cerrar Sesión',
          'color' => '',
        ),
        20 => 
        array (
          'component' => 'user_menu_cart',
          'text' => 'Mi Cotización',
          'color' => '',
        ),
        21 => 
        array (
          'component' => 'user_menu_back',
          'text' => 'Volver',
          'color' => '',
        ),
      ),
    ),
  ),
);
$DescriptorFichero = fopen($file.'fotovoltaica/appconfig.json', "w");
$string1           =json_encode($d);
fputs($DescriptorFichero, $string1);
fclose($DescriptorFichero);

}


if ($this->request->get['category_id']==86){
@unlink($file.'termica/appconfig.json');

$d=array (
  'app_activity' => 5,
  'base_url' => $base_url,
  'assets' => 
  array (
    0 => 
    array (
      'name' => 'app_logo',
      'value' => 'assets/images/logo.png',
    ),
    1 => 
    array (
      'name' => 'app_no_image',
      'value' => 'assets/img/no-image.jpg',
    ),
    2 => 
    array (
      'name' => 'home_background',
      'value' => 'assets/images/home.gif',
    ),
    3 => 
    array (
      'name' => 'menu_categories_background',
      'value' => 'assets/images/category_background.gif',
    ),
    4 => 
    array (
      'name' => 'product_background',
      'value' => 'images/fondo-pantalla.png',
    ),
    5 => 
    array (
      'name' => 'product_detail_background',
      'value' => 'assets/images/termica.gif',
    ),
    6 => 
    array (
      'name' => 'cart_background',
      'value' => 'assets/images/barra-superior.jpg',
    ),
  ),
  'routes' => 
  array (
    0 => 
    array (
      'route_name' => 'login_url',
      'value' => 'index.php?route=api%2Flogin',
    ),
    1 => 
    array (
      'route_name' => 'url_get_categories',
      'value' => 'index.php?route=api/allproducts/categories&json&parent=',
    ),
    2 => 
    array (
      'route_name' => 'products_filter_by_category',
      'value' => 'index.php?route=api/allproducts/filterbyCategories&categoria=',
    ),
    3 => 
    array (
      'route_name' => 'get_product_by_id',
      'value' => 'index.php?route=api/allproducts/productInfo&json&product_id=',
    ),
    4 => 
    array (
      'route_name' => 'search_product',
      'value' => '/index.php?route=api/allproducts/autocomplete&filter_name=',
    ),
    5 => 
    array (
      'route_name' => 'register_url',
      'value' => 'index.php?route=account/register',
    ),
    6 => 
    array (
      'route_name' => 'get_user_url',
      'value' => 'index.php?route=api/allproducts/getuser&filter_email=',
    ),
    7 => 
    array (
      'route_name' => 'asign_token',
      'value' => 'index.php?route=api/customer&api_token=',
    ),
    8 => 
    array (
      'route_name' => 'close_session',
      'value' => 'index.php?route=api/customer/close&api_token=',
    ),
    9 => 
    array (
      'route_name' => 'add_product',
      'value' => 'index.php?route=api/cart/add&api_token=',
    ),
    10 => 
    array (
      'route_name' => 'get_cart',
      'value' => 'index.php?route=api%2Fcart%2Fproducts&api_token=',
    ),
    11 => 
    array (
      'route_name' => 'delete_cart_item',
      'value' => 'index.php?route=api/cart/remove&api_token=',
    ),
    12 => 
    array (
      'route_name' => 'update_cart_item',
      'value' => 'index.php?route=api/cart/edit&api_token=',
    ),
    13 => 
    array (
      'route_name' => 'set_checkout',
      'value' => 'index.php?route=api/shipping/address&api_token=',
    ),
    14 => 
    array (
      'route_name' => 'set_payment_address',
      'value' => 'index.php?route=api/payment/address&api_token=',
    ),
    15 => 
    array (
      'route_name' => 'get_shipping',
      'value' => 'index.php?route=api/shipping/methods&api_token=',
    ),
    16 => 
    array (
      'route_name' => 'set_shipping',
      'value' => 'index.php?route=api/shipping/method&api_token=',
    ),
    17 => 
    array (
      'route_name' => 'get_payment',
      'value' => 'index.php?route=api/payment/methods&api_token=',
    ),
    18 => 
    array (
      'route_name' => 'set_payment',
      'value' => 'index.php?route=api/payment/method&api_token=',
    ),
    19 => 
    array (
      'route_name' => 'add_order',
      'value' => 'index.php?route=api/order/add&api_token=',
    ),
  ),
  'attributes' => 
  array (
    0 => 
    array (
      'app_id' => 86,
      'banners' => 
      array (
        0 => 
        array (
          'component' => 'app_title',
          'text' => $tit,
        ),
        1 => 
        array (
          'component' => 'app_subtitle',
          'text' => $sub,
        ),
      ),
      'components' => 
      array (
        0 => 
        array (
          'component' => 'route_info',
          'text' => '',
          'color' => '#BDAD58',
        ),
        1 => 
        array (
          'component' => 'button_add_product',
          'text' => '+ Agregar a cotización',
          'color' => '#846D15',
        ),
        2 => 
        array (
          'component' => 'button_register',
          'text' => 'SEGUIR VIENDO PRODUCTOS',
          'color' => '#E8C078',
        ),
        3 => 
        array (
          'component' => 'button_continue',
          'text' => ' Continuar en otra pantalla',
          'color' => '#846D15',
        ),
        4 => 
        array (
          'component' => 'button_search_product',
          'text' => '',
          'color' => '#EEE48C',
        ),
        5 => 
        array (
          'component' => 'button_shopping_cart',
          'text' => '',
          'color' => '#EEE48C',
        ),
        6 => 
        array (
          'component' => 'button_product_more_details',
          'text' => 'Detalles técnicos',
          'color' => '#846D15',
        ),
        7 => 
        array (
          'component' => 'button_back_to_details',
          'text' => '<< Volver a detalles',
          'color' => '#7C6F25',
        ),
        8 => 
        array (
          'component' => 'button_finish_quotation',
          'text' => 'Finalizar cotización',
          'color' => '#7C6F25',
        ),
        9 => 
        array (
          'component' => 'button_finish_session',
          'text' => 'Finalizar Sesión',
          'color' => '#7C6F25',
        ),
        10 => 
        array (
          'component' => 'button_close_more_details',
          'text' => 'Cerrar',
          'color' => '#7C6F25',
        ),
        11 => 
        array (
          'component' => 'button_back_to_menu',
          'text' => 'Menú',
          'color' => '#87711B',
        ),
        12 => 
        array (
          'component' => 'button_found_product',
          'text' => 'Ver mas detalles',
          'color' => '#7C6f25',
        ),
        13 => 
        array (
          'component' => 'atributes_title',
          'text' => '',
          'color' => '#B7AA5F',
        ),
        14 => 
        array (
          'component' => 'slider_more_products',
          'text' => '',
          'color' => '#7C6F25',
        ),
        15 => 
        array (
          'component' => 'cart_product_bg_light',
          'text' => '',
          'color' => '#F7F4D5',
        ),
        16 => 
        array (
          'component' => 'cart_product_bg_dark',
          'text' => '',
          'color' => '#F8F0C2',
        ),
        17 => 
        array (
          'component' => 'user_form_acount_aviable',
          'text' => 'YA TENGO CUENTA',
          'color' => '',
        ),
        18 => 
        array (
          'component' => 'user_menu_home',
          'text' => 'Categorías',
          'color' => '',
        ),
        19 => 
        array (
          'component' => 'user_menu_close_session',
          'text' => 'Cerrar Sesión',
          'color' => '',
        ),
        20 => 
        array (
          'component' => 'user_menu_cart',
          'text' => 'Mi Cotización',
          'color' => '',
        ),
        21 => 
        array (
          'component' => 'user_menu_back',
          'text' => 'Volver',
          'color' => '',
        ),
      ),
    ),
  ),
);
$DescriptorFichero = fopen($file.'termica/appconfig.json', "w");
$string1           =json_encode($d);
fputs($DescriptorFichero, $string1);
fclose($DescriptorFichero);

}

if ($this->request->get['category_id']==66){
@unlink($file.'psicina/appconfig.json');

$d=array (
  'app_activity' => 5,
  'base_url' => $base_url,
  'assets' => 
  array (
    0 => 
    array (
      'name' => 'app_logo',
      'value' => 'assets/images/logo.png',
    ),
    1 => 
    array (
      'name' => 'app_no_image',
      'value' => 'assets/img/no-image.jpg',
    ),
    2 => 
    array (
      'name' => 'home_background',
      'value' => 'assets/images/home.gif',
    ),
    3 => 
    array (
      'name' => 'menu_categories_background',
      'value' => 'assets/images/category_background.gif',
    ),
    4 => 
    array (
      'name' => 'product_background',
      'value' => 'images/fondo-pantalla.png',
    ),
    5 => 
    array (
      'name' => 'product_detail_background',
      'value' => 'assets/images/ambient.gif',
    ),
    6 => 
    array (
      'name' => 'cart_background',
      'value' => 'assets/images/barra-superior.jpg',
    ),
  ),
  'routes' => 
  array (
    0 => 
    array (
      'route_name' => 'login_url',
      'value' => 'index.php?route=api%2Flogin',
    ),
    1 => 
    array (
      'route_name' => 'url_get_categories',
      'value' => 'index.php?route=api/allproducts/categories&json&parent=',
    ),
    2 => 
    array (
      'route_name' => 'products_filter_by_category',
      'value' => 'index.php?route=api/allproducts/filterbyCategories&categoria=',
    ),
    3 => 
    array (
      'route_name' => 'get_product_by_id',
      'value' => 'index.php?route=api/allproducts/productInfo&json&product_id=',
    ),
    4 => 
    array (
      'route_name' => 'search_product',
      'value' => '/index.php?route=api/allproducts/autocomplete&filter_name=',
    ),
    5 => 
    array (
      'route_name' => 'register_url',
      'value' => 'index.php?route=account/register',
    ),
    6 => 
    array (
      'route_name' => 'get_user_url',
      'value' => 'index.php?route=api/allproducts/getuser&filter_email=',
    ),
    7 => 
    array (
      'route_name' => 'asign_token',
      'value' => 'index.php?route=api/customer&api_token=',
    ),
    8 => 
    array (
      'route_name' => 'close_session',
      'value' => 'index.php?route=api/customer/close&api_token=',
    ),
    9 => 
    array (
      'route_name' => 'add_product',
      'value' => 'index.php?route=api/cart/add&api_token=',
    ),
    10 => 
    array (
      'route_name' => 'get_cart',
      'value' => 'index.php?route=api%2Fcart%2Fproducts&api_token=',
    ),
    11 => 
    array (
      'route_name' => 'delete_cart_item',
      'value' => 'index.php?route=api/cart/remove&api_token=',
    ),
    12 => 
    array (
      'route_name' => 'update_cart_item',
      'value' => 'index.php?route=api/cart/edit&api_token=',
    ),
    13 => 
    array (
      'route_name' => 'set_checkout',
      'value' => 'index.php?route=api/shipping/address&api_token=',
    ),
    14 => 
    array (
      'route_name' => 'set_payment_address',
      'value' => 'index.php?route=api/payment/address&api_token=',
    ),
    15 => 
    array (
      'route_name' => 'get_shipping',
      'value' => 'index.php?route=api/shipping/methods&api_token=',
    ),
    16 => 
    array (
      'route_name' => 'set_shipping',
      'value' => 'index.php?route=api/shipping/method&api_token=',
    ),
    17 => 
    array (
      'route_name' => 'get_payment',
      'value' => 'index.php?route=api/payment/methods&api_token=',
    ),
    18 => 
    array (
      'route_name' => 'set_payment',
      'value' => 'index.php?route=api/payment/method&api_token=',
    ),
    19 => 
    array (
      'route_name' => 'add_order',
      'value' => 'index.php?route=api/order/add&api_token=',
    ),
  ),
  'attributes' => 
  array (
    0 => 
    array (
      'app_id' => 66,
      'banners' => 
      array (
        0 => 
        array (
          'component' => 'app_title',
          'text' => $tit,
        ),
        1 => 
        array (
          'component' => 'app_subtitle',
          'text' => $sub,
        ),
      ),
      'components' => 
      array (
        0 => 
        array (
          'component' => 'route_info',
          'text' => '',
          'color' => '#79B2B2',
        ),
        1 => 
        array (
          'component' => 'button_add_product',
          'text' => '+ Agregar a cotización',
          'color' => '#4A665E',
        ),
        2 => 
        array (
          'component' => 'button_register',
          'text' => 'SEGUIR VIENDO PRODUCTOS',
          'color' => '#49E0E0',
        ),
        3 => 
        array (
          'component' => 'button_continue',
          'text' => ' Continuar en otra pantalla',
          'color' => '#4A665E',
        ),
        4 => 
        array (
          'component' => 'button_search_product',
          'text' => '',
          'color' => '#C2EDDF',
        ),
        5 => 
        array (
          'component' => 'button_shopping_cart',
          'text' => '',
          'color' => '#C2EDDF',
        ),
        6 => 
        array (
          'component' => 'button_product_more_details',
          'text' => 'Detalles técnicos',
          'color' => '#4A665E',
        ),
        7 => 
        array (
          'component' => 'button_back_to_details',
          'text' => '<< Volver a detalles',
          'color' => '#4A665E',
        ),
        8 => 
        array (
          'component' => 'button_finish_quotation',
          'text' => 'Finalizar cotización',
          'color' => '#4A665E',
        ),
        9 => 
        array (
          'component' => 'button_finish_session',
          'text' => 'Finalizar Sesión',
          'color' => '#4A665E',
        ),
        10 => 
        array (
          'component' => 'button_close_more_details',
          'text' => 'Cerrar',
          'color' => '#4A665E',
        ),
        11 => 
        array (
          'component' => 'button_back_to_menu',
          'text' => 'Menú',
          'color' => '#FFFFFF',
        ),
        12 => 
        array (
          'component' => 'button_found_product',
          'text' => 'Ver mas detalles',
          'color' => '#54AFB1',
        ),
        13 => 
        array (
          'component' => 'atributes_title',
          'text' => '',
          'color' => '#79B2B2',
        ),
        14 => 
        array (
          'component' => 'slider_more_products',
          'text' => '',
          'color' => '#4A665E',
        ),
        15 => 
        array (
          'component' => 'cart_product_bg_light',
          'text' => '',
          'color' => '#DCF4F1',
        ),
        16 => 
        array (
          'component' => 'cart_product_bg_dark',
          'text' => '',
          'color' => '#F5FFFB',
        ),
        17 => 
        array (
          'component' => 'user_form_acount_aviable',
          'text' => 'YA TENGO CUENTA',
          'color' => '',
        ),
        18 => 
        array (
          'component' => 'user_menu_home',
          'text' => 'Categorías',
          'color' => '',
        ),
        19 => 
        array (
          'component' => 'user_menu_close_session',
          'text' => 'Cerrar Sesión',
          'color' => '',
        ),
        20 => 
        array (
          'component' => 'user_menu_cart',
          'text' => 'Mi Cotización',
          'color' => '',
        ),
        21 => 
        array (
          'component' => 'user_menu_back',
          'text' => 'Volver',
          'color' => '',
        ),
      ),
    ),
  ),
);
$DescriptorFichero = fopen($file.'psicina/appconfig.json', "w");
$string1           =json_encode($d);
fputs($DescriptorFichero, $string1);
fclose($DescriptorFichero);

}

if ($this->request->get['category_id']==95){
@unlink($file.'refrigeracion/appconfig.json');

$d=array (
  'app_activity' => 5,
  'base_url' => $base_url,
  'assets' => 
  array (
    0 => 
    array (
      'name' => 'app_logo',
      'value' => 'assets/images/logo.png',
    ),
    1 => 
    array (
      'name' => 'app_no_image',
      'value' => 'assets/img/no-image.jpg',
    ),
    2 => 
    array (
      'name' => 'home_background',
      'value' => 'assets/images/home.gif',
    ),
    3 => 
    array (
      'name' => 'menu_categories_background',
      'value' => 'assets/images/category_background.gif',
    ),
    4 => 
    array (
      'name' => 'product_background',
      'value' => 'images/fondo-pantalla.png',
    ),
    5 => 
    array (
      'name' => 'product_detail_background',
      'value' => 'assets/images/ambient.gif',
    ),
    6 => 
    array (
      'name' => 'cart_background',
      'value' => 'assets/images/barra-superior.jpg',
    ),
  ),
  'routes' => 
  array (
    0 => 
    array (
      'route_name' => 'login_url',
      'value' => 'index.php?route=api%2Flogin',
    ),
    1 => 
    array (
      'route_name' => 'url_get_categories',
      'value' => 'index.php?route=api/allproducts/categories&json&parent=',
    ),
    2 => 
    array (
      'route_name' => 'products_filter_by_category',
      'value' => 'index.php?route=api/allproducts/filterbyCategories&categoria=',
    ),
    3 => 
    array (
      'route_name' => 'get_product_by_id',
      'value' => 'index.php?route=api/allproducts/productInfo&json&product_id=',
    ),
    4 => 
    array (
      'route_name' => 'search_product',
      'value' => '/index.php?route=api/allproducts/autocomplete&filter_name=',
    ),
    5 => 
    array (
      'route_name' => 'register_url',
      'value' => 'index.php?route=account/register',
    ),
    6 => 
    array (
      'route_name' => 'get_user_url',
      'value' => 'index.php?route=api/allproducts/getuser&filter_email=',
    ),
    7 => 
    array (
      'route_name' => 'asign_token',
      'value' => 'index.php?route=api/customer&api_token=',
    ),
    8 => 
    array (
      'route_name' => 'close_session',
      'value' => 'index.php?route=api/customer/close&api_token=',
    ),
    9 => 
    array (
      'route_name' => 'add_product',
      'value' => 'index.php?route=api/cart/add&api_token=',
    ),
    10 => 
    array (
      'route_name' => 'get_cart',
      'value' => 'index.php?route=api%2Fcart%2Fproducts&api_token=',
    ),
    11 => 
    array (
      'route_name' => 'delete_cart_item',
      'value' => 'index.php?route=api/cart/remove&api_token=',
    ),
    12 => 
    array (
      'route_name' => 'update_cart_item',
      'value' => 'index.php?route=api/cart/edit&api_token=',
    ),
    13 => 
    array (
      'route_name' => 'set_checkout',
      'value' => 'index.php?route=api/shipping/address&api_token=',
    ),
    14 => 
    array (
      'route_name' => 'set_payment_address',
      'value' => 'index.php?route=api/payment/address&api_token=',
    ),
    15 => 
    array (
      'route_name' => 'get_shipping',
      'value' => 'index.php?route=api/shipping/methods&api_token=',
    ),
    16 => 
    array (
      'route_name' => 'set_shipping',
      'value' => 'index.php?route=api/shipping/method&api_token=',
    ),
    17 => 
    array (
      'route_name' => 'get_payment',
      'value' => 'index.php?route=api/payment/methods&api_token=',
    ),
    18 => 
    array (
      'route_name' => 'set_payment',
      'value' => 'index.php?route=api/payment/method&api_token=',
    ),
    19 => 
    array (
      'route_name' => 'add_order',
      'value' => 'index.php?route=api/order/add&api_token=',
    ),
  ),
  'attributes' => 
  array (
    0 => 
    array (
      'app_id' => 95,
      'banners' => 
      array (
        0 => 
        array (
          'component' => 'app_title',
          'text' => $tit,
        ),
        1 => 
        array (
          'component' => 'app_subtitle',
          'text' => $sub,
        ),
      ),
      'components' => 
      array (
        0 => 
        array (
          'component' => 'route_info',
          'text' => '',
          'color' => '#B5A8FA',
        ),
        1 => 
        array (
          'component' => 'button_add_product',
          'text' => '+ Agregar a cotización',
          'color' => '#5D53B2',
        ),
        2 => 
        array (
          'component' => 'button_register',
          'text' => 'SEGUIR VIENDO PRODUCTOS',
          'color' => '#BEA8EE',
        ),
        3 => 
        array (
          'component' => 'button_continue',
          'text' => ' Continuar en otra pantalla',
          'color' => '#5D53B2',
        ),
        4 => 
        array (
          'component' => 'button_search_product',
          'text' => '',
          'color' => '#F1EAFC',
        ),
        5 => 
        array (
          'component' => 'button_shopping_cart',
          'text' => '',
          'color' => '#F1EAFC',
        ),
        6 => 
        array (
          'component' => 'button_product_more_details',
          'text' => 'Detalles técnicos',
          'color' => '#5D53B2',
        ),
        7 => 
        array (
          'component' => 'button_back_to_details',
          'text' => '<< Volver a detalles',
          'color' => '#5D53B2',
        ),
        8 => 
        array (
          'component' => 'button_finish_quotation',
          'text' => 'Finalizar cotización',
          'color' => '#5D53B2',
        ),
        9 => 
        array (
          'component' => 'button_finish_session',
          'text' => 'Finalizar Sesión',
          'color' => '#5D53B2',
        ),
        10 => 
        array (
          'component' => 'button_close_more_details',
          'text' => 'Cerrar',
          'color' => '#5D53B2',
        ),
        11 => 
        array (
          'component' => 'button_back_to_menu',
          'text' => 'Menú',
          'color' => '#FFFFFF',
        ),
        12 => 
        array (
          'component' => 'button_found_product',
          'text' => 'Ver mas detalles',
          'color' => '#DEADE4',
        ),
        13 => 
        array (
          'component' => 'atributes_title',
          'text' => '',
          'color' => '#B5A8FA',
        ),
        14 => 
        array (
          'component' => 'slider_more_products',
          'text' => '',
          'color' => '#5D53B2',
        ),
        15 => 
        array (
          'component' => 'cart_product_bg_light',
          'text' => '',
          'color' => '#F8ECFA',
        ),
        16 => 
        array (
          'component' => 'cart_product_bg_dark',
          'text' => '',
          'color' => '#EBCCEC',
        ),
        17 => 
        array (
          'component' => 'user_form_acount_aviable',
          'text' => 'YA TENGO CUENTA',
          'color' => '',
        ),
        18 => 
        array (
          'component' => 'user_menu_home',
          'text' => 'Categorías',
          'color' => '',
        ),
        19 => 
        array (
          'component' => 'user_menu_close_session',
          'text' => 'Cerrar Sesión',
          'color' => '',
        ),
        20 => 
        array (
          'component' => 'user_menu_cart',
          'text' => 'Mi Cotización',
          'color' => '',
        ),
        21 => 
        array (
          'component' => 'user_menu_back',
          'text' => 'Volver',
          'color' => '',
        ),
      ),
    ),
  ),
);
$DescriptorFichero = fopen($file.'refrigeracion/appconfig.json', "w");
$string1           =json_encode($d);
fputs($DescriptorFichero, $string1);
fclose($DescriptorFichero);

}


if ($this->request->get['category_id']==100){
@unlink($file.'riego/appconfig.json');

$d=array (
  'app_activity' => 9,
  'base_url' => $base_url,
  'assets' => 
  array (
    0 => 
    array (
      'name' => 'app_logo',
      'value' => 'assets/images/logo.png',
    ),
    1 => 
    array (
      'name' => 'app_no_image',
      'value' => 'assets/img/no-image.jpg',
    ),
    2 => 
    array (
      'name' => 'home_background',
      'value' => 'assets/images/home.gif',
    ),
    3 => 
    array (
      'name' => 'menu_categories_background',
      'value' => 'assets/images/category_background.gif',
    ),
    4 => 
    array (
      'name' => 'product_background',
      'value' => 'images/fondo-pantalla.png',
    ),
    5 => 
    array (
      'name' => 'product_detail_background',
      'value' => 'assets/images/ambient.gif',
    ),
    6 => 
    array (
      'name' => 'cart_background',
      'value' => 'assets/images/barra-superior.jpg',
    ),
  ),
  'routes' => 
  array (
    0 => 
    array (
      'route_name' => 'login_url',
      'value' => 'index.php?route=api%2Flogin',
    ),
    1 => 
    array (
      'route_name' => 'url_get_categories',
      'value' => 'index.php?route=api/allproducts/categories&json&parent=',
    ),
    2 => 
    array (
      'route_name' => 'products_filter_by_category',
      'value' => 'index.php?route=api/allproducts/filterbyCategories&categoria=',
    ),
    3 => 
    array (
      'route_name' => 'get_product_by_id',
      'value' => 'index.php?route=api/allproducts/productInfo&json&product_id=',
    ),
    4 => 
    array (
      'route_name' => 'search_product',
      'value' => '/index.php?route=api/allproducts/autocomplete&filter_name=',
    ),
    5 => 
    array (
      'route_name' => 'register_url',
      'value' => 'index.php?route=account/register',
    ),
    6 => 
    array (
      'route_name' => 'get_user_url',
      'value' => 'index.php?route=api/allproducts/getuser&filter_email=',
    ),
    7 => 
    array (
      'route_name' => 'asign_token',
      'value' => 'index.php?route=api/customer&api_token=',
    ),
    8 => 
    array (
      'route_name' => 'close_session',
      'value' => 'index.php?route=api/customer/close&api_token=',
    ),
    9 => 
    array (
      'route_name' => 'add_product',
      'value' => 'index.php?route=api/cart/add&api_token=',
    ),
    10 => 
    array (
      'route_name' => 'get_cart',
      'value' => 'index.php?route=api%2Fcart%2Fproducts&api_token=',
    ),
    11 => 
    array (
      'route_name' => 'delete_cart_item',
      'value' => 'index.php?route=api/cart/remove&api_token=',
    ),
    12 => 
    array (
      'route_name' => 'update_cart_item',
      'value' => 'index.php?route=api/cart/edit&api_token=',
    ),
    13 => 
    array (
      'route_name' => 'set_checkout',
      'value' => 'index.php?route=api/shipping/address&api_token=',
    ),
    14 => 
    array (
      'route_name' => 'set_payment_address',
      'value' => 'index.php?route=api/payment/address&api_token=',
    ),
    15 => 
    array (
      'route_name' => 'get_shipping',
      'value' => 'index.php?route=api/shipping/methods&api_token=',
    ),
    16 => 
    array (
      'route_name' => 'set_shipping',
      'value' => 'index.php?route=api/shipping/method&api_token=',
    ),
    17 => 
    array (
      'route_name' => 'get_payment',
      'value' => 'index.php?route=api/payment/methods&api_token=',
    ),
    18 => 
    array (
      'route_name' => 'set_payment',
      'value' => 'index.php?route=api/payment/method&api_token=',
    ),
    19 => 
    array (
      'route_name' => 'add_order',
      'value' => 'index.php?route=api/order/add&api_token=',
    ),
  ),
  'attributes' => 
  array (
    0 => 
    array (
      'app_id' => 100,
      'banners' => 
      array (
        0 => 
        array (
          'component' => 'app_title',
          'text' => $tit,
        ),
        1 => 
        array (
          'component' => 'app_subtitle',
          'text' => $sub,
        ),
      ),
      'components' => 
      array (
        0 => 
        array (
          'component' => 'route_info',
          'text' => '',
          'color' => '#4EBFA1',
        ),
        1 => 
        array (
          'component' => 'button_add_product',
          'text' => '+ Agregar a cotización',
          'color' => '#337865',
        ),
        2 => 
        array (
          'component' => 'button_register',
          'text' => 'SEGUIR VIENDO PRODUCTOS',
          'color' => '#9BE6BB',
        ),
        3 => 
        array (
          'component' => 'button_continue',
          'text' => ' Continuar en otra pantalla',
          'color' => '#337865',
        ),
        4 => 
        array (
          'component' => 'button_search_product',
          'text' => '',
          'color' => '#BFF1BC',
        ),
        5 => 
        array (
          'component' => 'button_shopping_cart',
          'text' => '',
          'color' => '#BFF1BC',
        ),
        6 => 
        array (
          'component' => 'button_product_more_details',
          'text' => 'Detalles técnicos',
          'color' => '#337865',
        ),
        7 => 
        array (
          'component' => 'button_back_to_details',
          'text' => '<< Volver a detalles',
          'color' => '#337865',
        ),
        8 => 
        array (
          'component' => 'button_finish_quotation',
          'text' => 'Finalizar cotización',
          'color' => '#337865',
        ),
        9 => 
        array (
          'component' => 'button_finish_session',
          'text' => 'Finalizar Sesión',
          'color' => '#337865',
        ),
        10 => 
        array (
          'component' => 'button_close_more_details',
          'text' => 'Cerrar',
          'color' => '#337865',
        ),
        11 => 
        array (
          'component' => 'button_back_to_menu',
          'text' => 'Menú',
          'color' => '#FFFFFF',
        ),
        12 => 
        array (
          'component' => 'button_found_product',
          'text' => 'Ver mas detalles',
          'color' => '#4EBFA1',
        ),
        13 => 
        array (
          'component' => 'atributes_title',
          'text' => '',
          'color' => '#4EBFA1',
        ),
        14 => 
        array (
          'component' => 'slider_more_products',
          'text' => '',
          'color' => '#337865',
        ),
        15 => 
        array (
          'component' => 'cart_product_bg_light',
          'text' => '',
          'color' => '#E3F9EC',
        ),
        16 => 
        array (
          'component' => 'cart_product_bg_dark',
          'text' => '',
          'color' => '#C8F2DC',
        ),
        17 => 
        array (
          'component' => 'user_form_acount_aviable',
          'text' => 'YA TENGO CUENTA',
          'color' => '',
        ),
        18 => 
        array (
          'component' => 'user_menu_home',
          'text' => 'Categorías',
          'color' => '',
        ),
        19 => 
        array (
          'component' => 'user_menu_close_session',
          'text' => 'Cerrar Sesión',
          'color' => '',
        ),
        20 => 
        array (
          'component' => 'user_menu_cart',
          'text' => 'Mi Cotización',
          'color' => '',
        ),
        21 => 
        array (
          'component' => 'user_menu_back',
          'text' => 'Volver',
          'color' => '',
        ),
      ),
    ),
  ),
);
$DescriptorFichero = fopen($file.'riego/appconfig.json', "w");
$string1           =json_encode($d);
fputs($DescriptorFichero, $string1);
fclose($DescriptorFichero);

}







//var_dump($this->request->get['category_id']);





			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $category_id) {
				$this->model_catalog_category->deleteCategory($category_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	public function repair() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if ($this->validateRepair()) {
			$this->model_catalog_category->repairCategories();

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/category/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/category/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['repair'] = $this->url->link('catalog/category/repair', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['categories'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$category_total = $this->model_catalog_category->getTotalCategories();

		$results = $this->model_catalog_category->getCategories($filter_data);

		foreach ($results as $result) {
			$data['categories'][] = array(
				'category_id' => $result['category_id'],
				'name'        => $result['name'],
				'sort_order'  => $result['sort_order'],
				'edit'        => $this->url->link('catalog/category/edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true),
				'delete'      => $this->url->link('catalog/category/delete', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true)
			);
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($category_total - $this->config->get('config_limit_admin'))) ? $category_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $category_total, ceil($category_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/category_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['category_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = array();
		}

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		if (isset($this->error['parent'])) {
			$data['error_parent'] = $this->error['parent'];
		} else {
			$data['error_parent'] = '';
		}
		
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['category_id'])) {
			$data['action'] = $this->url->link('catalog/category/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/category/edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $this->request->get['category_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['category_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$category_info = $this->model_catalog_category->getCategory($this->request->get['category_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['category_description'])) {
			$data['category_description'] = $this->request->post['category_description'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_description'] = $this->model_catalog_category->getCategoryDescriptions($this->request->get['category_id']);
		} else {
			$data['category_description'] = array();
		}

		if (isset($this->request->post['path'])) {
			$data['path'] = $this->request->post['path'];
		} elseif (!empty($category_info)) {
			$data['path'] = $category_info['path'];
		} else {
			$data['path'] = '';
		}

		if (isset($this->request->post['parent_id'])) {
			$data['parent_id'] = $this->request->post['parent_id'];
		} elseif (!empty($category_info)) {
			$data['parent_id'] = $category_info['parent_id'];
		} else {
			$data['parent_id'] = 0;
		}

		$this->load->model('catalog/filter');

		if (isset($this->request->post['category_filter'])) {
			$filters = $this->request->post['category_filter'];
		} elseif (isset($this->request->get['category_id'])) {
			$filters = $this->model_catalog_category->getCategoryFilters($this->request->get['category_id']);
		} else {
			$filters = array();
		}

		$data['category_filters'] = array();

		foreach ($filters as $filter_id) {
			$filter_info = $this->model_catalog_filter->getFilter($filter_id);

			if ($filter_info) {
				$data['category_filters'][] = array(
					'filter_id' => $filter_info['filter_id'],
					'name'      => $filter_info['group'] . ' &gt; ' . $filter_info['name']
				);
			}
		}

		$this->load->model('setting/store');

		$data['stores'] = array();
		
		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);
		
		$stores = $this->model_setting_store->getStores();

		foreach ($stores as $store) {
			$data['stores'][] = array(
				'store_id' => $store['store_id'],
				'name'     => $store['name']
			);
		}

		if (isset($this->request->post['category_store'])) {
			$data['category_store'] = $this->request->post['category_store'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_store'] = $this->model_catalog_category->getCategoryStores($this->request->get['category_id']);
		} else {
			$data['category_store'] = array(0);
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($category_info)) {
			$data['image'] = $category_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($category_info) && is_file(DIR_IMAGE . $category_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($category_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['top'])) {
			$data['top'] = $this->request->post['top'];
		} elseif (!empty($category_info)) {
			$data['top'] = $category_info['top'];
		} else {
			$data['top'] = 0;
		}

		if (isset($this->request->post['column'])) {
			$data['column'] = $this->request->post['column'];
		} elseif (!empty($category_info)) {
			$data['column'] = $category_info['column'];
		} else {
			$data['column'] = 1;
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($category_info)) {
			$data['sort_order'] = $category_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($category_info)) {
			$data['status'] = $category_info['status'];
		} else {
			$data['status'] = true;
		}
		
		if (isset($this->request->post['category_seo_url'])) {
			$data['category_seo_url'] = $this->request->post['category_seo_url'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_seo_url'] = $this->model_catalog_category->getCategorySeoUrls($this->request->get['category_id']);
		} else {
			$data['category_seo_url'] = array();
		}
				
		if (isset($this->request->post['category_layout'])) {
			$data['category_layout'] = $this->request->post['category_layout'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_layout'] = $this->model_catalog_category->getCategoryLayouts($this->request->get['category_id']);
		} else {
			$data['category_layout'] = array();
		}

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/category_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['category_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 1) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			if ((utf8_strlen($value['meta_title']) < 1) || (utf8_strlen($value['meta_title']) > 255)) {
				$this->error['meta_title'][$language_id] = $this->language->get('error_meta_title');
			}
		}

		if (isset($this->request->get['category_id']) && $this->request->post['parent_id']) {
			$results = $this->model_catalog_category->getCategoryPath($this->request->post['parent_id']);
			
			foreach ($results as $result) {
				if ($result['path_id'] == $this->request->get['category_id']) {
					$this->error['parent'] = $this->language->get('error_parent');
					
					break;
				}
			}
		}

		if ($this->request->post['category_seo_url']) {
			$this->load->model('design/seo_url');
			
			foreach ($this->request->post['category_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						if (count(array_keys($language, $keyword)) > 1) {
							$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_unique');
						}

						$seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($keyword);
	
						foreach ($seo_urls as $seo_url) {
							if (($seo_url['store_id'] == $store_id) && (!isset($this->request->get['category_id']) || ($seo_url['query'] != 'category_id=' . $this->request->get['category_id']))) {		
								$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_keyword');
				
								break;
							}
						}
					}
				}
			}
		}
		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function validateRepair() {
		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('catalog/category');

			$filter_data = array(
				'filter_name' => $this->request->get['filter_name'],
				'sort'        => 'name',
				'order'       => 'ASC',
				'start'       => 0,
				'limit'       => 5
			);

			$results = $this->model_catalog_category->getCategories($filter_data);

			foreach ($results as $result) {
				$json[] = array(
					'category_id' => $result['category_id'],
					'name'        => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
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
