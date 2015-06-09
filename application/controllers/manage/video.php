<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MY_Controller {
	private $sae_domain = 's1';
	private $colum_title = '视频管理';

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data = array();
		
		$data['content_view'] = 'manage/video/video_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}

	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('video_model','v');
		
		$data = $this->v->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$data['data'][$k]['v_youku'] = '<a href="' . $v['v_youku'] . '">查看</a>';
			$data['data'][$k]['v_thumb'] = '<div><img src="' . $v['v_thumb'] . '" height="50px" /></div>';
			$data['data'][$k]['operation'] = '<a href="/manage/video/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
			$data['data'][$k]['operation'] .= '<a href="/manage/video/del/' . $v['id'] . '">删除</a>';
		}
		
		echo json_encode($data);
	}
	
	public function del($id = ''){
		$this->load->model('Video_Model','v');
		if(empty($id) && !$this->v->getById($id) ){
			$data['content_view'] = 'manage/common/redirect';
			$data['content_data']['class'] = 'bg-danger';
			$data['content_data']['text'] = '您所请求的数据不存在';
			$data['content_data']['url'] = 'manage/video';
			$this->load->view('manage/main', $data);
		}
		
		$result = $this->v->delete($id);
		if( $result ){
			$data['content_view'] = 'manage/common/redirect';
			$data['content_data']['class'] = 'bg-success';
			$data['content_data']['text'] = '你所提交的操作已经成功处理';
			$data['content_data']['url'] = 'manage/video';
		}else{
			$data['content_view'] = 'manage/common/redirect';
			$data['content_data']['class'] = 'bg-danger';
			$data['content_data']['text'] = '后台没能正确处理您的请求，我们将带您引导至其他页面';
			$data['content_data']['url'] = 'manage/video';
		}
		$this->load->view('manage/main', $data);
	}
	
	public function edit($id){
		$data = array();
		
		$this->load->model('Video_Model','v');
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
			$data = $this->v->getById($id);
			$this->v->setFieldParameter('v_category', array(0,0,2));
			$data['html_form'] = $this->generate_edit_form($data, $this->v, 'manage/video/edit/' . $id);
				
			$data['content_view'] = 'manage/video/video_add';
			$data['content_data'] = '';
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			if ( $this->upload->sae_upload( $this->sae_domain, 'v_thumb')){
// 			if ( $this->upload->do_upload( 'v_thumb' ) ){
				$updata = array('upload_data' => $this->upload->data());
				$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
// 				$data['v_thumb'] = 'http://yueshi.my/temp/' . $updata['upload_data']['file_name'];
				$data['v_location'] = $updata['upload_data']['full_path'];
			}else{
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				
				$this->redirectAction(FALSE, $data, '/manage/video', '/manage/video');
				return false;
			}
			$data[$this->v->id] = $id;
				
			$result = $this->v->update( $data, $id );
			if( $result ){
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-success';
				$data['content_data']['text'] = '你所提交的操作已经成功处理';
				$data['content_data']['url'] = '/index.php/manage/video';
			}else{
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-danger';
				$data['content_data']['text'] = '后台没能正确处理您的请求，我们将带您引导至其他页面';
				$data['content_data']['url'] = '/index.php/manage/video';
			}
		}
		
		$this->load->view('manage/main', $data);
	}
	
	public function add(){
		$data = array();
		$this->load->model('Video_Model','v');
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
			$this->v->setFieldParameter('v_category', array(0,0,2));
			$data['html_form'] = $this->generate_add_form($this->v, 'manage/video/add');
			
			$data['content_view'] = 'manage/video/video_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
			
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
			
// 			if ( ! $this->upload->sae_upload( $this->sae_domain, 'v_thumb')){
			if ( ! $this->upload->do_upload( 'v_thumb' ) ){
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				$this->redirectAction(FALSE, $data, '/manage/article', '/manage/article/add');
				return false;
			}else{
				$updata = array('upload_data' => $this->upload->data());
// 				$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['v_thumb'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
				$data['v_location'] = $updata['upload_data']['full_path'];
			}
			
			$result = $this->v->insert( $data );
			$this->redirectAction($result, $data, '/manage/video', '/manage/video/add');
		}
	}
}