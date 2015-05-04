<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
	}
	
	
	public function add(){
		$this->load->model('Comment_Model', 'c');
		$this->load->model('User_Model', 'u');
		$this->load->helper('date');
		$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
		$data = $this->input->post(NULL, true);
		$data['userip'] = $this->input->ip_address();
		$data['ua'] = $this->input->user_agent();
		$data['userinfo'] = $this->u->getById($data['userid']);
		$result = $this->c->insert( $data );
		if($result){
			$html = '<div class="ys_comment_item container-fluid"><div class="row"><div class="col-md-2">';
			if(empty($data['userinfo']['usericon'])){
				$html .= '<img src="' . $this->config->item('default_icon') . '" width="50px" />';
			}else{
				$html .= '<img src="' . $$data['userinfo']['usericon'] . '" width="50px">';
			}
			$html .= '</div><div class="col-md-10"><p>';
			$html .= $data['userinfo']['username'] . '&nbsp;&nbsp;' . $data['insert_time'];
			$html .= '</p><p>' . $data['content'] . '</p></div></div></div>';
			      						
			$r_data = array('errno'=>'0','errinfo'=>'','data'=>$data, 'html'=>$html);
		}else{
			$r_data = array('errno'=>'1','errinfo'=>'数据库写入失败');
		}
		
		echo json_encode($r_data);
	}

}