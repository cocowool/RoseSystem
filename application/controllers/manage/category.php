<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 显示指定类别的分类菜单
	 * 
	 * @param string $type
	 */
	public function index($type=''){

		$data['category_type'] = $type;
		$data['content_view'] = 'manage/category/category_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('category_model','c');
		
		$data = $this->c->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		echo json_encode($data);
	}
}
