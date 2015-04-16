<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		
		$data = array();
		
		$data['content_view'] = '';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}

}