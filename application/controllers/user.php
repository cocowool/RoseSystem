<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	
	public function register(){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		
		$this->config->set_item('language', 'chinese');		//加载中文验证信息
		$this->load->library('form_validation');
		
		$this->load->view('user/register', $data);
	}
}