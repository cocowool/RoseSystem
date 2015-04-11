<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MY_Controller {
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

	public function test(){
		$data['content_view'] = 'manage/common/redirect';
		$data['content_data']['class'] = 'bg-success';
		$data['content_data']['text'] = '你所提交的操作已经成功处理';
		$data['content_data']['url'] = '';
		
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
			$data['html_form'] = $this->generate_add_form($this->v, 'manage/video/add');
			
			$data['content_view'] = 'manage/video/video_add';
			$data['content_data'] = '';
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
			
// 			$result = $this->v->insert( $data );
			$result = TRUE;
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