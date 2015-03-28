<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	
	public function index(){
		$data = array();
		
		$this->load->view('index', $data);
	}
}