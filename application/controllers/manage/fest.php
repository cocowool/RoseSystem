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
	
	public function forum($action = 'list', $id = ''){
		switch ($action){
			case 'add':
				$this->forum_add();
				break;
			case 'edit':
				$this->forum_edit($id);
				break;
			case "del":
				$this->forum_del($id);
				break;
			case 'list':
			default:
				$this->forum_list();
				break;
		}
	}
	
	private function forum_add(){
		$data = array();
		$this->load->model('Forum_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'f_title',
						'label'	=>	'自定义标题',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_order',
						'label'	=>	'排序',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_thumb',
						'label'	=>	'缩略图',
						'rules'	=>	'trim|required'
				)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->s, 'manage/fest/forum/add');
			$data['content_view'] = 'manage/fest/fest_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
		
			$result = $this->s->insert( $data );
			$this->redirectAction($result, $data, '/manage/fest/forum', '/manage/fest/forum/add');
		}		
	}
	
	private function forum_edit($id){
		
	}
	
	private function forum_del($id){
		
	}
	
	private function forum_list(){
		
	}
	
	protected function get_selector_html(){
		$html = "<p>This is a html selector.</p>";
		echo 'xxxxxx';
		return $html;
	}
	
	
	public function consultant($action = 'list', $id = ''){
		switch ($action){
			case 'add':
				$this->consultant_add();
				break;
			case 'edit':
				$this->consultant_edit($id);
				break;
			case "del":
				$this->consultant_del($id);
				break;
			case 'list':
			default:
				$this->consultant_list();
				break;
		}
	}
	
	private function consultant_list(){
		$data = array();
		
		$data['content_view'] = 'manage/fest/consultant_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
	private function consultant_del($id){
		$data = array();
		$this->load->model('Consultant_Model','s');
		if(empty($id) && !$this->s->getById($id) ){
			$data['content_data']['text'] = '您所请求的数据不存在';
			$this->redirectAction(FALSE, $data, '/manage/fest/consultant', '/manage/fest/consultant');
		}
		
		$result = $this->s->delete($id);
		$this->redirectAction($result, $data, '/manage/fest/consultant', '/manage/fest/consultant');
	}
	
	private function consultant_edit($id){
		$data = array();
		$this->load->model('Consultant_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'f_name',
						'label'	=>	'顾问姓名',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_words',
						'label'	=>	'顾问评价',
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
			$data['html_form'] = $this->generate_edit_form($data, $this->s, 'manage/fest/consultant/edit', $id);
			$data['content_view'] = 'manage/fest/fest_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
		
			$result = $this->s->update( $data );
			$this->redirectAction($result, $data, '/manage/fest/consultant', '/manage/fest/consultant/edit/'.$id);
		}		
	}
	
	private function consultant_add(){
		$data = array();
		$this->load->model('Consultant_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
						'field'	=>	'f_name',
						'label'	=>	'顾问姓名',
						'rules'	=>	'trim|required'
				),
				array(
						'field'	=>	'f_words',
						'label'	=>	'顾问评价',
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
			$data['html_form'] = $this->generate_add_form($this->s, 'manage/fest/consultant/add');
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
		$source = 'fest';
		if(isset($request['source']) and !empty($request['source'])){
			$source = $request['source'];
		}
		
		switch($source){
			case 'consultant':
				$this->load->model('consultant_model','c');
				$this->load->model('fest_model','f');
				$data = $this->c->dtRequest($request);
				//可以在此处进行返回数据的自定义处理
				foreach($data['data'] as $k=>$v){
					$fest = $this->f->getById($v['fid']);
					$data['data'][$k]['fid'] = $fest['f_year'];
					
					$data['data'][$k]['operation'] = '<a href="/manage/fest/consultant/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
					$data['data'][$k]['operation'] .= '<a href="/manage/fest/consultant/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
				}
				echo json_encode($data);
				break;
			case 'fest':
			default:
				$this->load->model('fest_model','f');
				$data = $this->f->dtRequest($request);
				//可以在此处进行返回数据的自定义处理
				foreach($data['data'] as $k=>$v){
					$data['data'][$k]['operation'] = '<a href="/manage/fest/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
					$data['data'][$k]['operation'] .= '<a href="/manage/fest/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
				}
				echo json_encode($data);
				break;
		}
		
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