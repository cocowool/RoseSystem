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
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		
		if($this->form_validation->run() == FALSE){
			
			$data['html_form'] = $this->generate_add_form($this->v, 'manage/video/add');
			
			$data['content_view'] = 'manage/video/video_add';
			$data['content_data'] = '';
		}else{
			$data['content_view'] = 'manage/video/video_add';
			$data['content_data'] = '';
		}
		
		$this->load->view('manage/main', $data);
	}
}