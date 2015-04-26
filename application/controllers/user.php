<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {
	private $form_validate = array(
			array(
					'field'	=>	'username',
					'label'	=>	'用户名称',
					'rules'	=>	'trim|required|min_length[3]|max_length[12]|xss_clean|callback_chkDuplicate'
			),
			array(
					'field'	=>	'password',
					'label'	=>	'用户密码',
					'rules'	=>	'trime|required|matches[chkPassword]',
			),
			array(
					'field'	=>	'chkPassword',
					'label'	=>	'密码确认',
					'rules'	=>	'trime|required',
			),
			array(
					'field'	=>	'lastname',
					'label'	=>	'姓',
					'rules'	=>	'trim|required',
			),
			array(
					'field'	=>	'firstname',
					'label'	=>	'名',
					'rules'	=>	'trim|required',
			),
			array(
					'field'	=>	'birthday',
					'label'	=>	'出生日期',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'hometown',
					'label'	=>	'居住地',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'address',
					'label'	=>	'邮寄地址',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'gender',
					'label'	=>	'性别',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'eathome',
					'label'	=>	'在家吃饭吗',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'cooklover',
					'label'	=>	'喜爱烹饪吗',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'cookoften',
					'label'	=>	'经常烹饪吗',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'travel',
					'label'	=>	'经常旅行吗',
					'rules'	=>	'trim',
			),
			array(
					'field'	=>	'mobile',
					'label'	=>	'手机号码',
					'rules'	=>	'trim|required',
			),
			array(
					'field'	=>	'email',
					'label'	=>	'电子邮件',
					'rules'	=>	'trim|required|valid_email',
			),
			array(
					'field'	=>	'chkMobile',
					'label'	=>	'验证码',
					'rules'	=>	'trim|required|callback_chkValidateCode',
			),
	);
	
	public function __construct(){
		parent::__construct();
	}
	
	
	public function register(){
		$this->load->model('User_Model','u');
		$this->load->helper('captcha');
		$data = array();
		$data = array_merge($data, $this->getPubData());

		$this->config->set_item('language', 'chinese');
		$config = $this->form_validate;
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		
		//校验用户名
		if($this->form_validation->run() == FALSE){
			$this->load->view('user/register', $data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
			
			$result = $this->u->insertMethod( $data );
			if( $result ){
				$data['url'] = base_url() . 'register/success';
				$data['content'] = "正在跳转";
				$data['timeout'] = 0;
				$this->load->view('manage/include/sys_msg', $data);
			}else{
				$data['url'] = base_url() . 'register/failure';
				$data['content'] = "正在跳转";
				$data['timeout'] = 0;
				$this->load->view('manage/include/sys_msg', $data);
			}
		}
	}
}