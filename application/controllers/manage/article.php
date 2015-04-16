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

	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('article_model','a');
		
		$data = $this->a->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
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
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			//if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
			if ( ! $this->upload->do_upload( 'v_thumb' ) ){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				die('Upload Failed');
			}else{
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['v_thumb'] = 'http://yueshi.my/temp/' . $updata['upload_data']['file_name'];
				$data['v_location'] = $updata['upload_data']['full_path'];
			}
				
			$result = $this->v->insert( $data );
			if( $result ){
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-success';
				$data['content_data']['text'] = '你所提交的操作已经成功处理';
				$data['content_data']['url'] = '/index.php/manage/video';
			}else{
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-danger';
				$data['content_data']['text'] = '后台没能正确处理您的请求，我们将带您引导至其他页面';
				$data['content_data']['url'] = '/index.php/manage/video/add';
			}
		}
		
		$this->load->view('manage/main', $data);
	}
}