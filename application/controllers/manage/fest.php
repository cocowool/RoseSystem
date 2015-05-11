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
	
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('store_model','s');
		
		$data = $this->s->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['s_thumb'] = '<a href=""><img src="' .$v['s_thumb'] .'" height="50px" /></a>';
			$data['data'][$k]['operation'] = '<a href="/manage/store/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/store/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
		}
		
		echo json_encode($data);
	}
}