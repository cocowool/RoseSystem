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
	
	public function add(){
		$data = array();
	
		$this->load->model('Store_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
					'field'	=>	's_title',
					'label'	=>	'商品名称',
					'rules'	=>	'trim|required'
				),
				array(
					'field'	=>	's_desc',
					'label'	=>	'商品简介',
					'rules'	=>	'trim|required'
				),
				array(
					'field'	=>	's_text',
					'label'	=>	'商品详情',
					'rules'	=>	'trim|required'
				)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
	
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->s, 'manage/store/add');
			$data['content_view'] = 'manage/store/store_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			if ( ! $this->upload->sae_upload( $this->sae_domain, 's_thumb')){
// 			if ( ! $this->upload->do_upload( 's_thumb' ) ){
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				$this->redirectAction(FALSE, $data, '/manage/store', '/manage/store');
				return false;
			}else{
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['s_thumb'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
				$data['s_location'] = $updata['upload_data']['full_path'];
			}
				
			$result = $this->s->insert( $data );
			$this->redirectAction($result, $data, '/manage/store', '/manage/store/add');
		}
	}
		
	public function del($id = ''){
		$this->load->model('Store_Model','s');
		if(empty($id) && !$this->s->getById($id) ){
			$data['content_data']['text'] = '您所请求的数据不存在';
			$this->redirectAction(FALSE, $data, '/manage/store', '/manage/store');
		}
		
		$result = $this->s->delete($id);
		$this->redirectAction($result, $data, '/manage/store', '/manage/store');
	}
	
	public function edit($id){
		$data = array();
		
		$this->load->model('Store_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
			array(
				'field'	=>	's_title',
				'label'	=>	'商品名称',
				'rules'	=>	'trim|required'
			),
			array(
				'field'	=>	's_desc',
				'label'	=>	'商品简介',
				'rules'	=>	'trim|required'
			),
			array(
				'field'	=>	's_text',
				'label'	=>	'商品详情',
				'rules'	=>	'trim|required'
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data = $this->s->getById($id);
			$data['html_form'] = $this->generate_edit_form($data, $this->s, 'manage/store/edit/' . $id);
			$data['content_view'] = 'manage/store/store_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			if ( ! $this->upload->sae_upload( $this->sae_domain, 's_thumb')){
// 			if ( $this->upload->do_upload( 's_thumb' ) ){
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['s_thumb'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
				$data['s_location'] = $updata['upload_data']['full_path'];
			}
				
			$result = $this->s->update( $data, $data['id'] );
			$this->redirectAction($result, $data, '/manage/store', '/manage/store/'.$data['id']);
		}
		
	}
}