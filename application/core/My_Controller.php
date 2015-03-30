<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  公共Controller
 * 
 */
class MY_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();

		//校验是否为后台登录地址，后台登陆校验后台用户登录情况，前台地址校验前台用户登录情况
		if( $this->isBackend() ){
			echo "Backend Login<br />";
		}

	}


	public function isBackend(){
		if( $this->uri->segment(1) == $this->config->item('adm_segment') && $this->uri->segment(2) != $this->config->item('adm_segment_auth') ){
			return TRUE;
		}
		
		return FALSE;
	}

}