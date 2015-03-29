<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	
	public function index(){
		$data = array();
		$data['tie'] = rand(1,3);	//随机首页的丝带图标
		
		
		$this->load->view('index', $data);
	}
}