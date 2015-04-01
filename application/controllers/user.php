<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	
	public function register(){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		
		$this->load->view('user/register', $data);
	}
}