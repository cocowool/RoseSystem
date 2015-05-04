<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
	}
	
	
	public function add(){
		$this->load->model('Comment_Model', 'c');
		$this->load->helper('date');
		$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
		$data = $this->input->post(NULL, true);
		$data['userip'] = $this->input->ip_address();
		$data['ua'] = $this->input->user_agent();
		
		$result = $this->c->insert( $data );
		if($result){
			$r_data = array('errno'=>'0','errinfo'=>'');
		}else{
			$r_data = array('errno'=>'1','errinfo'=>'数据库写入失败');
		}
		
		echo json_encode($r_data);
	}

}