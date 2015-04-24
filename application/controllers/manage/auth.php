<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		isset($_SERVER['HTTP_REFERER'])?$data['HTTP_REFERER'] = $_SERVER['HTTP_REFERER']:'';

		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$referer = $this->input->post('referer', TRUE);
		
		if( !$username || !$password ){
			$this->load->view('manage/login', $data);
		}else{
			if( $username == $this->config->item('adm_username') && $password == $this->config->item('adm_password') ){
				$this->session->set_userdata($this->config->item('adm_sess_username'), $username);
				$this->session->set_userdata($this->config->item('adm_sess_status'), 1);
				$this->session->set_userdata($this->config->item('adm_sess_level'), 9999);
			
				if(!empty($referer)){
					$url = $referer;
				}else{
					$url = $this->config->item('adm_segment');
				}
				redirect( $url );
				return TRUE;
			}else{
				$this->load->model('User_model', 'u');
				$userinfo = $this->u->getById($username, 'username');
				if( $userinfo && $userinfo['password'] == $password ){
					$this->session->set_userdata('admUsername', $username);
					$this->session->set_userdata('admId', $userinfo['id']);
					$this->session->set_userdata('adminLogin', 2);
			
					if(!empty($referer)){
						$url = $this->input->post('referer');
					}else{
						$url = $this->config->item('adm_segment' . '/main');
					}
					redirect( $url );
					return TRUE;
				}else 
					
				redirect( $this->config->item('adm_segment') . '/auth/login');
				return FALSE;
			}
		}
	}
}
