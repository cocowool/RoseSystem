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
	
	public function consultant($action = 'list'){
		switch ($action){
			case 'add':
				$this->consultant_add();
				break;
			case 'edit':
				break;
			case "del":
				break;
			case 'list':
			default:
				break;
		}
	}
	
	private function consultant_add(){
		$data = array();
		$this->load->model('Consultant_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'f_year',
						'label'	=>	'大会年份',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_name',
						'label'	=>	'大会名称',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_desc',
						'label'	=>	'大会简介',
						'rules'	=>	'trim|required'
				)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->s, 'manage/fest/add');
			$data['content_view'] = 'manage/fest/fest_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
		
			$result = $this->s->insert( $data );
			$this->redirectAction($result, $data, '/manage/fest', '/manage/fest/add');
		}		
	}
	
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('fest_model','f');
		
		$data = $this->f->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['operation'] = '<a href="/manage/fest/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/fest/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
		}
		
		echo json_encode($data);
	}
	
	public function add(){
		$data = array();
	
		$this->load->model('Fest_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'f_year',
						'label'	=>	'大会年份',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_name',
						'label'	=>	'大会名称',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_desc',
						'label'	=>	'大会简介',
						'rules'	=>	'trim|required'
				)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
	
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->s, 'manage/fest/add');
			$data['content_view'] = 'manage/fest/fest_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
	
			$result = $this->s->insert( $data );
			$this->redirectAction($result, $data, '/manage/fest', '/manage/fest/add');
		}
	}

	public function del($id = ''){
		$data = array();
		$this->load->model('Fest_Model','s');
		if(empty($id) && !$this->s->getById($id) ){
			$data['content_data']['text'] = '您所请求的数据不存在';
			$this->redirectAction(FALSE, $data, '/manage/fest', '/manage/fest');
		}
	
		$result = $this->s->delete($id);
		$this->redirectAction($result, $data, '/manage/fest', '/manage/fest');
	}
	
	public function edit($id){
		$data = array();
	
		$this->load->model('Fest_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'f_year',
						'label'	=>	'大会年份',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_name',
						'label'	=>	'大会名称',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_desc',
						'label'	=>	'大会简介',
						'rules'	=>	'trim|required'
				)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
	
		if($this->form_validation->run() == FALSE){
			$data = $this->s->getById($id);
			$data['html_form'] = $this->generate_edit_form($data, $this->s, 'manage/fest/edit/' . $id);
			$data['content_view'] = 'manage/fest/fest_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
	
			$result = $this->s->update( $data, $data['id'] );
			$this->redirectAction($result, $data, '/manage/fest', '/manage/fest/'.$data['id']);
		}
	
	}	
}