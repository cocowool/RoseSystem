<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fest extends MY_Controller {
	private $colum_title = '悦食大会管理';

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data = array();
	
		$data['content_view'] = 'manage/fest/fest_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
}