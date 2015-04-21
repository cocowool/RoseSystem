<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data = array();
	
		$data['content_view'] = 'manage/store/store_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('resource_model','r');
		
		//处理自定义条件
		if( isset($request['aid']) ){
			$request['condition'][] = array('data'	=>	$request['aid'], 'field' => 'aid', 'action' => 'where'	);
		}
		
		$data = $this->r->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['image'] = '<a href=""><img src="' .$v['web_path'] .'" height="50px" /></a>';
			$data['data'][$k]['operation'] = '<a href="/manage/resource/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/resource/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="javascript:void(0);">复制链接</a>';
		}
		
		echo json_encode($data);
	}
}