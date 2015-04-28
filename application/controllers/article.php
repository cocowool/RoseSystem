<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Article_Model', 'a');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('Category_Model', 'c');
		
		$this->load->view('article/list', $data);
	}
	
	/**
	 * 文章详情页
	 * 
	 * @param int $article
	 */
	public function detail( $article ){
		$this->load->model('Article_Model','a');
		$this->load->model('Resource_Model', 'r');
	
		$data = array();
		$data = $this->a->getById($article);
		if( count($data) == 1 ){
			$data = $data[0];
		}else{
			//报错
		}
		
		//获取资源列表
		$res_option = array();
		if( !empty($data['id']) ){
			$res_option[] = array('data' => $data['id'], 'field' => 'aid', 'action' => 'where');
			$res_data = $this->r->getAll($res_option, 0, 100, 'sort', 'desc');
			$data['images'] = $res_data;
		}
	
		$data['related_article'] = $this->realted_article($data['category'], $data['id']);
		$data = array_merge($data, $this->getPubData());
		
		$this->load->view('article/detail', $data);
	}	
	
	/**
	 * 获取相关文章的列表
	 *
	 * @param integer $cid	文章分类ID
	 */
	private function realted_article($cid, $id = ''){
		$this->load->model('Article_Model','a');
		$option = array();
		$option[] = array( 'data' => $cid, 'field' => 'category', 'action' => 'where' );
		if( !empty($id) ){
			$option[] = array( 'data' => $id, 'field' => 'id !=', 'action' => 'where' );
		}
		$data = $this->a->getAll($option, 0, 1000);
	
		if( empty($data) ){
			return false;
		}
	
		return $data;
	}	
}