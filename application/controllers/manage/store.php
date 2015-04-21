<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data = array();
	
		$data['content_view'] = 'manage/store/store_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
}