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

	public function ajaxGet(){
		$json_data = array();
		$request = $this->input->post();
		$this->load->model('article_model','a');
		$this->load->model('category_model','c');
		
		$option = array();
		$ids = $this->c->get_category_ids($request['category']);
		$option[] = array('data'=>$ids, 'field'=>'category','action'=>'where_in');
		$json_data = $this->a->getAll($option);
		
		echo json_encode($json_data);
	}
	
	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('article_model','a');
		$this->load->model('category_model', 'c');
		$category = $this->c->get_all_category(0);
		
		$data = $this->a->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['category'] = $category[$v['category']];
			$data['data'][$k]['resource'] = '<a href="/manage/resource/' . $v['id'] . '">图片资源</a>&nbsp;&nbsp;';
			$data['data'][$k]['resource'] .= '<a href="/manage/resource/add/' . $v['id'] . '">新增图片</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] = '<a href="/manage/article/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/article/del/' . $v['id'] . '">删除</a>';
		}
		
		echo json_encode($data);
	}
	
	public function add(){
		$data = array();
		
		$this->load->model('Article_Model','a');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'name',
						'label'	=>	'文章名称',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'content',
						'label'	=>	'文章内容',
						'rules'	=>	'trim|required'
				),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->a, 'manage/article/add');
				
			$data['content_view'] = 'manage/article/article_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);

			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			if ( ! $this->upload->sae_upload( $this->sae_domain, 'cover')){
// 			if ( ! $this->upload->do_upload( 'cover' ) ){
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				$this->redirectAction(FALSE, $data, '/manage/article', '/manage/article/add');
				return false;
			}else{
				$updata = array('upload_data' => $this->upload->data());
				$data['cover'] = $updata['upload_data']['sae_full_path'];
// 				$data['cover'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
			}
			$result = $this->a->insert( $data );
			
			$this->redirectAction($result, $data, '/manage/article', '/manage/article/add');
		}
	}
	
	public function edit($id){
		$data = array();
	
		$this->load->model('Article_Model','a');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'name',
						'label'	=>	'文章名称',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'content',
						'label'	=>	'文章内容',
						'rules'	=>	'trim|required'
				),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
	
		if($this->form_validation->run() == FALSE){
			$data = $this->a->getById($id);
			$data['html_form'] = $this->generate_edit_form($data, $this->a, 'manage/article/edit/' . $id);
	
			$data['content_view'] = 'manage/article/article_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
	
			$config = $this->config->item('image_upload_config');
// 			$this->load->library('upload', $config);
			if ( $this->upload->sae_upload( $this->sae_domain, 'cover')){
			if ( $this->upload->do_upload( 'cover' ) ){
				$updata = array('upload_data' => $this->upload->data());
				$data['cover'] = $updata['upload_data']['sae_full_path'];
// 				$data['cover'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
				$data['s_location'] = $updata['upload_data']['full_path'];
			}
				
			$result = $this->a->update( $data, $id );
			$this->redirectAction($result, $data, '/manage/article', '/manage/article/edit'.$id);
		}
	}
}