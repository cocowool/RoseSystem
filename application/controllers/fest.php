<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fest extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index($year = ''){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Fest_Model', 'f');
		$this->load->model('Article_Model', 'a');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$option = array();
		$data['fest_total'] = $this->f->getTotal($option);
		$data['fest_list'] = $this->f->getAll($option, $year, 9);
		
		$this->load->library('pagination');
		$config['base_url'] = '/fest/index/';
		$config['total_rows'] = $data['fest_total'];
		$config['uri_segment'] = 4;
		$config['per_page'] = 9;
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();
		
		$this->load->view('fest/detail', $data);
	}
}