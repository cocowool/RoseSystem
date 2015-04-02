<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  公共Controller
 * 
 */
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		//校验是否为后台登录地址，后台登陆校验后台用户登录情况，前台地址校验前台用户登录情况
		if( $this->isBackend() ){
			$this->backendAuthCheck();
		}

	}

	public function isBackend(){
		if( $this->uri->segment(1) == $this->config->item('adm_segment') && $this->uri->segment(2) != $this->config->item('adm_segment_auth') ){
			return TRUE;
		}
		
		return FALSE;
	}

	public function backendAuthCheck(){
		$tag_username = $this->config->item('adm_sess_username');
		
		if( !$this->session->userdata($tag_username) ){
			redirect('/'.$this->config->item('adm_segment').'/'.$this->config->item('adm_segment_auth'));
		}
		
		return TRUE;
	}

	/**
	 * 获取控制器中一些公共数据
	 */
	protected function getPubData(){
		$data = array();
		$data['tie'] = rand(1,3);	//随机首页的丝带图标
		
		return $data;
	}
}