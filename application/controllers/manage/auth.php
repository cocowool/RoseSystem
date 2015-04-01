<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		
		
		
		
		$this->load->view('manage/login', $data);
	}
}
