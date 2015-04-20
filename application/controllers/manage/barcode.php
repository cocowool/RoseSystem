<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barcode extends MY_Controller {
	private $colum_title = '二维码管理';

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		
		$data['content_view'] = 'manage/barcode/barcode_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
}