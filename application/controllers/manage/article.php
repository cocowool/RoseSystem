<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {
	private $colum_title = '文章管理';

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		
		$data['content_view'] = 'manage/article/article_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}

	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('article_model','a');
		
		$data = $this->a->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['operation'] = '<a href="/manage/article/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/article/del/' . $v['id'] . '">删除</a>';
		}
		
		echo json_encode($data);
	}
}