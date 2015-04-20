<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resource extends MY_Controller {
	private $colum_title = '资源管理';

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		
		$data['content_view'] = 'manage/resource/resource_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}

	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('resource_model','r');
		
		$data = $this->r->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['image'] = '<a href=""><img src="' .$v['web_path'] .'" height="50px" /></a>';
			$data['data'][$k]['operation'] = '<a href="/manage/resource/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/resource/del/' . $v['id'] . '">删除</a>';
		}
		
		echo json_encode($data);
	}
	
	/**
	 * 删除图片资源
	 * 
	 * @param int $id
	 */
	public function del($id){
		$data = array();
		$this->load->model('Resource_Model','r');
		if(empty($id) && !$this->r->getById($id) ){
			$this->redirectAction(FALSE, $data, '', '/manage/article');
		}
		
		$result = $this->r->delete($id);
		$this->redirectAction($result, $data, '', '/manage/article');
		$this->load->view('manage/main', $data);
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
			$result = $this->a->insert( $data );
			
			$this->redirectAction($result, $data, '/manage/article', '/manage/article/add');
		}
	}
	
	public function edit($id){
		$data = array();
	
		$this->load->model('Resource_Model','r');
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
			$data = $this->r->getById($id);
			$data['html_form'] = $this->generate_edit_form($data, $this->r, 'manage/resource/edit/' . $id);
	
			$data['content_view'] = 'manage/resource/resource_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
	
			$result = $this->r->update( $data, $id );
			$this->redirectAction($result, $data, '/manage/resource/' . $id, '/manage/resource/edit'.$id);
		}
	}
}