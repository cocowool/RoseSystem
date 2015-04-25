<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($type = ''){
		$data = array();
		switch ($type){
			case 'focus':
				$view = 'manage/focus_list';
				break;
			case 'top':
				$view = 'manage/top_list';
				break;
			default:
				$view = 'manage/default';
				break;
		}
		
		$data['content_view'] = 'manage/default';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
}