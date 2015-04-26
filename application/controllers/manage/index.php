<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		$data['content_view'] = 'manage/default';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
	public function focus($action = ''){
		$data = array();
		switch ($action){
			case "add":
				break;
			default:
				$data['content_view'] = 'manage/index/focus_list';
				$data['content_data'] = $data;
				$this->load->view('manage/main', $data);
				break;
		}
	}
	
	public function serverside($action = 'focus'){
		switch ($action){
			case 'focus':
				$this->getFocusList();
				break;
			case 'top':
				break;
		}
	}
	
	private function getFocusList(){
		$data = array();
		$request = $this->input->post();
		$this->load->model('focus_model','f');
		$data = $this->f->dtRequest($request);
		
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['operation'] = '<a href="/manage/store/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/store/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
		}
		echo json_encode($data);
	}
}