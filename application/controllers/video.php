<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($id = ''){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Video_Model', 'v');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$this->load->view('video/list', $data);
	}
	
	public function detail($id){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Video_Model', 'v');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$this->load->view('video/detail', $data);
	}
}