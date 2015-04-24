<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 显示指定类别的分类菜单
	 * 菜单分类，1为杂志，2为影像
	 * 
	 * @param string $type
	 */
	public function index($type='1'){

		$data['category_type'] = $type;
		$data['content_view'] = 'manage/category/category_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 */
	public function serverside(){
		$request = $this->input->post();
		$this->load->model('category_model','c');
		
		//处理自定义条件
		if( isset($request['ctype']) ){
			$request['condition'][] = array('data'	=>	$request['ctype'], 'field' => 'ctype', 'action' => 'where'	);
		}
		
		$data = $this->c->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			if($v['pid'] == 0){
				$data['data'][$k]['parent'] = '首页';
			}else{
				$parent = $this->c->getById($v['pid']);
				$data['data'][$k]['parent'] = $parent['category'];
			}
			
			$data['data'][$k]['operation'] = '<a href="/index.php/manage/category/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;<a href="/index.php/manage/category/del/' . $v['id'] . '">删除</a>';
		}
		
		echo json_encode($data);
	}
	
	
	public function add($ctype = 1){
		$data = array();
		
		$this->load->model('Category_Model','c');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
			array(
				'field'	=>	'category',
				'label'	=>	'分类名称',
				'rules'	=>	'trim|required'
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data['category_type'] = $ctype;
			//增加个隐藏字段
			$this->c->setField( array(array('name'=>'ctype', 'comment'=>'分类', 'form'=> array('type'=>'hidden','data'=>array('source'=>'static','value'=> $ctype))) ));
			$this->c->setFieldParameter('pid', array(0,0,$ctype));
			$data['html_form'] = $this->generate_add_form($this->c, 'manage/category/add/' . $ctype );
		
			$data['content_view'] = 'manage/category/category_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);		
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
			$result = $this->c->insert( $data );
			$this->redirectAction($result, $data, '/manage/category/'.$ctype, '/manage/category/add/'.$ctype);
		}
		
	}
	
	public function edit($id){
		$data = array();
		
		$this->load->model('Category_Model','c');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
			array(
				'field'	=>	'category',
				'label'	=>	'分类名称',
				'rules'	=>	'trim|required'
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data = $this->c->getById($id);
			$data['html_form'] = $this->generate_edit_form($data, $this->c, 'manage/category/edit/' . $id);
		
			$data['content_view'] = 'manage/video/video_add';
			$data['content_data'] = '';
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
			$result = $this->c->update( $data, $id );
			if( $result ){
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-success';
				$data['content_data']['text'] = '你所提交的操作已经成功处理';
				$data['content_data']['url'] = '/manage/category';
			}else{
				$data['content_view'] = 'manage/common/redirect';
				$data['content_data']['class'] = 'bg-danger';
				$data['content_data']['text'] = '后台没能正确处理您的请求，我们将带您引导至其他页面';
				$data['content_data']['url'] = '/manage/cagetory/edit/' . $id;
			}
		}
		
		$this->load->view('manage/main', $data);		
	}
}
