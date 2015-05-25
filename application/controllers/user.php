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
	
	public function detail(){
		$username = $this->session->userdata('gUsername');
		if(empty($username)){
			redirect('/user/login');
			return true;
		}
		
		$this->load->model('User_Model','u');
		$data = array();
		$data = array_merge($data, $this->getPubData());
		
		$this->config->set_item('language', 'chinese');
		$config = array(
				array(
						'field'	=>	'username',
						'label'	=>	'用户名称',
						'rules'	=>	'trim|required|min_length[3]|max_length[12]|xss_clean|callback_chkDuplicate'
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
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE){
			$data['userinfo'] = $this->u->getById($username,'username');
			$this->load->view('user/detail', $data);
		}else{
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			//if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
			if ( $this->upload->do_upload( 'usericon' ) ){
				$updata = array('upload_data' => $this->upload->data());
				$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
// 				$data['v_thumb'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
				$data['usericon'] = $updata['upload_data']['full_path'];
			}
				
			$result = $this->u->update( $data );
			if($result){
				$this->stageRedirect('您的信息已经成功更新。');
			}else{
				$this->stageRedirect('信息更新失败，请联系网站管理员。');
			}
		}
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


	public function message(){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		
		$this->load->view('common/redirect', $data);
	}
	
	public function success(){
		$data['status'] = '注册成功，欢迎加入悦食会。前往 <a href="/">首页</a>';
		$data['errmsg'] = '';
		$this->load->view('user/register_result', $data);
	}
	
	public function failure(){
		$data['status'] = '注册失败';
		$data['errmsg'] = '具体原因，请咨询网站管理员';
		$this->load->view('user/register_result', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
	
	public function login( $eventid = '' ){
		$this->load->model('User_Model', 'u');
		$data = array();
		$data = array_merge($data, $this->getPubData());
		
		$config = array(
				array(
						'field'	=>	'username',
						'label'	=>	'用户名称',
						'rules'	=>	'trim|required|min_length[3]|max_length[12]|xss_clean'
				),
				array(
						'field'	=>	'password',
						'label'	=>	'用户密码',
						'rules'	=>	'trime|required',
				),
		);
		$this->config->set_item('language', 'chinese');
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
	
		if($this->form_validation->run() == FALSE){
			$data['eventid'] = $eventid;
			if($this->input->server('HTTP_REFERER') != ''){
				$data['referer'] = $this->input->server('HTTP_REFERER');
			}else{
				$data['referer'] = '';
			}
			$this->load->view('user/login', $data);
		}else{
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$eventid = $this->input->post('eventid', TRUE);
			$referer = $this->input->post('referer', TRUE);
	
			$userinfo = $this->u->getById($username, 'username');
			if( $userinfo && $userinfo['password'] == $password ){
				$this->session->set_userdata('gUsername', $username);
				$this->session->set_userdata('gUserid', $userinfo['id']);
				
				if( !empty($eventid) ){
					redirect('/events/register/' . $eventid . '/' . $userinfo['id'] );
				}else if( !empty($referer) ){
					redirect($referer);
				}else{
					redirect('/');
				}
				return TRUE;
			}
				
			return FALSE;
		}
	}	
}