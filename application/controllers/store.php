<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index($page = '0'){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Store_Model', 's');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$option = array();
		$data['store_total'] = $this->s->getTotal($option);
		$data['store_list'] = $this->s->getAll($option, $page, 9);
		
		$this->load->library('pagination');
		$config['base_url'] = '/store/index/';
		$config['total_rows'] = $data['store_total'];
		$config['uri_segment'] = 4;
		$config['per_page'] = 9;
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();

		$this->load->view('store/list', $data);
	}
}