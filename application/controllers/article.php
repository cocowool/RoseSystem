<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function detail( $article ){
		$this->load->model('Article_Model','a');
		$this->load->model('Resource_Model', 'r');
	
		$data = array();
		$data = $this->a->getById($article);
			
		//获取资源列表
		$res_option = array();
		if( !empty($data['id']) ){
			$res_option[] = array('data' => $data['id'], 'field' => 'aid', 'action' => 'where');
			$res_data = $this->r->getAll($res_option, 0, 100, 'sort', 'desc');
			$data['images'] = $res_data;
		}
	
		$data['related_article'] = $this->realted_article($data['category'], $data['id']);
	
		$this->load->view('detail_v2', $data);
	}	
}