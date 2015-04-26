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
	
	public function top($action = '', $id = ''){
		$data = array();
		switch ($action){
			case "add":
				$this->addTop();
				break;
			case "edit":
				$this->editData($id);
				break;
			case "del":
				$this->delData($id);
				break;
			default:
				$data['content_view'] = 'manage/index/top_list';
				$data['content_data'] = $data;
				$this->load->view('manage/main', $data);
				break;
		}
	}
	
	
	public function focus($action = ''){
		$data = array();
		switch ($action){
			case "add":
				$this->addFocus();
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
				$this->getTopList();
				break;
		}
	}
	
	private function addFocus(){
		$data = array();
		$this->load->model('Focus_Model','v');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
			array(
				'field'	=>	'f_title',
				'label'	=>	'名称',
				'rules'	=>	'trim|required'
			),
			array(
				'field'	=>	'f_desc',
				'label'	=>	'简介',
				'rules'	=>	'trim|required'
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->v, 'manage/index/focus/add');
			
			$data['content_view'] = 'manage/index/focus_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
			
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
			
			//if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
			if ( ! $this->upload->do_upload( 'f_img' ) ){
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				$this->redirectAction(FALSE, $data, '/manage/index/focus', '/manage/index/focus');
				return false;
			}else{
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['f_img'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
			}
			
			$result = $this->v->insert( $data );
			$this->redirectAction($result, $data, '/manage/index/focus', '/manage/index/focus');
		}
	}
	
	private function addTop(){
		$data = array();
		$this->load->model('Top_Model','v');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'f_title',
						'label'	=>	'名称',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_desc',
						'label'	=>	'简介',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_link',
						'label'	=>	'链接',
						'rules'	=>	'trim|required'
				),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
	
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->v, 'manage/index/top/add');
				
			$data['content_view'] = 'manage/index/focus_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			//if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
			if ( ! $this->upload->do_upload( 'f_img' ) ){
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				$this->redirectAction(FALSE, $data, '/manage/index/top', '/manage/index/top');
				return false;
			}else{
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['f_img'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
			}
				
			$result = $this->v->insert( $data );
			$this->redirectAction($result, $data, '/manage/index/top', '/manage/index/top');
		}
	}	
	
	private function getFocusList(){
		$data = array();
		$request = $this->input->post();
		$this->load->model('focus_model','f');
		$data = $this->f->dtRequest($request);
		
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['f_img'] = "<a href='javascript:void(0);'><img height='50px' src='".$v['f_img']."'/></a>";
			$data['data'][$k]['operation'] = '<a href="/manage/index/focus/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/index/focus/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
		}
		echo json_encode($data);
	}

	private function getTopList(){
		$data = array();
		$request = $this->input->post();
		$this->load->model('top_model','f');
		$data = $this->f->dtRequest($request);
		
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['f_img'] = "<a href='javascript:void(0);'><img height='50px' src='".$v['f_img']."'/></a>";
			$data['data'][$k]['operation'] = '<a href="/manage/index/top/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/index/top/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
		}
		echo json_encode($data);
	}
}