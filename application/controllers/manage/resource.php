<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resource extends MY_Controller {
	private $colum_title = '资源管理';

	public function __construct(){
		parent::__construct();
	}

	public function index($id){
		$data = array();
		$data['aid'] = $id;
		
		$data['content_view'] = 'manage/resource/resource_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
	public function ajaxGet(){
		$json_data = array();
		$request = $this->input->post();
		$this->load->model('article_model','a');
		$this->load->model('category_model','c');
		$this->load->model('resource_model','r');
		
		$option = array();
		$option[] = array('data'=>$request['aid'], 'field'=>'aid','action'=>'where_in');
		$json_data = $this->r->getAll($option);
		
		echo json_encode($json_data);
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
	
	
	public function add($id = ''){
		$data = array();
		if(empty($id)){
			$data['content_data']['user_text'] = '没有指定资源归属的文章。';
			$this->redirectAction(FALSE, $data, '/manage/resource', '/manage/resource');
			return false;
		}
		
		
		$this->load->model('Resource_Model','r');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'web_path',
						'label'	=>	'网页访问路径',
						'rules'	=>	'trim'
				),
				array(
					'field'	=>	'description',
					'label'	=>	'资源描述',
					'rules'	=>	'trim',				
				),
				array(
					'field'	=>	'author',
					'label'	=>	'作者',
					'rules'	=>	'trim',				
				),
				array(
					'field'	=>	'sort',
					'label'	=>	'排序',
					'rules'	=>	'trim',				
				),
				array(
					'field'	=>	'status',
					'label'	=>	'状态',
					'rules'	=>	'trim',				
				),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$extra['data']['aid'] = $id;
			$data['html_form'] = $this->generate_add_form($this->r, 'manage/resource/add/' . $id, $extra);
				
			$data['content_view'] = 'manage/resource/resource_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			//if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
			if ( ! $this->upload->do_upload( 'web_path' ) ){
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				$this->redirectAction(FALSE, $data, '/manage/resource', '/manage/resource');
				return false;
			}else{
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['web_path'] = 'http://yueshichina.my/temp/' . $updata['upload_data']['file_name'];
				$data['path'] = $updata['upload_data']['full_path'];
				$data['filename'] = $updata['upload_data']['file_name'];
			}
				
			$result = $this->r->insert( $data );
			$this->redirectAction($result, $data, '/manage/resource', '/manage/resource/add');
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