<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		$file="C:\wamp\www\carrito/ip.json";
		$office= $file;
		$content=file_get_contents($office);
		$data=json_decode($content,true);
		$mostrar="none";
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
			} else {
			$ip = $_SERVER['REMOTE_ADDR'];
			}

			foreach ($data as $key => $value) {
				if ($value['ip']==$ip){
					$mostrar='block';
				break;
				}
			}
           
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		$data['mostrar']=$mostrar;

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}
