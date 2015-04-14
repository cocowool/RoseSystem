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
		foreach($data['data'] as $k=>$v){
			if($v['pid'] == 0){
				$data['data'][$k]['parent'] = '首页';
			}else{
				$parent = $this->c->getById($v['pid']);
				$data['data'][$k]['parent'] = $parent['category'];
			}
			
			$data['data'][$k]['operation'] = '<a href="/index.php/manage/category/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;<a href="/index.php/manage/category/del/' . $v['id'] . '">删除</a>';
		}
		
		echo json_encode($data);
	}
	
	
	public function edit($id){
		$data = array();
		
		$this->load->model('Category_Model','c');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'v_title',
						'label'	=>	'视频名称',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'v_desc',
						'label'	=>	'视频简介',
						'rules'	=>	'trim|required'
				),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data = $this->c->getById($id);
			$data['html_form'] = $this->generate_edit_form($data, $this->c, 'manage/video/edit/' . $id);
		
			$data['content_view'] = 'manage/video/video_add';
			$data['content_data'] = '';
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
			$result = $this->c->update( $data, $id );
			if( $result ){
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-success';
				$data['content_data']['text'] = '你所提交的操作已经成功处理';
				$data['content_data']['url'] = 'manage/video';
			}else{
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-danger';
				$data['content_data']['text'] = '后台没能正确处理您的请求，我们将带您引导至其他页面';
				$data['content_data']['url'] = 'manage/video/add';
			}
		}
		
		$this->load->view('manage/main', $data);		
	}
}