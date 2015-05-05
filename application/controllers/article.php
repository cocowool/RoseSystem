<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function _remap( $method, $params = array() ){
		if( method_exists($this, $method) ){
			return call_user_func_array(array($this,$method), $params);
		}else{
			array_push($params, $method);
			return call_user_func_array(array($this,'index'), $params);
		}
	}
	
	public function index($category = 0, $page = 1){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Article_Model', 'a');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('Category_Model', 'c');
		
		$data['current_category'] = $category;
		//默认调取杂志分类下的信息
		$default_category = '0';
		$option = array();
		$option[] = array('data' => '1', 'field' => 'ctype', 'action' => 'where' );
		$option[] = array('data' => $default_category, 'field' => 'pid', 'action' => 'where' );
		$data['category_list'] = $this->c->getAll($option);
		
		$option = array();
		$ids = $this->c->get_category_ids($category);
		$option[] = array('data'=>$ids, 'field'=>'category','action'=>'where_in');
		$data['article_list'] = $this->a->getAll($option, 0, 9);

		$this->load->view('article/list', $data);
	}
	
	/**
	 * 返回Ajax请求对应的数据
	 * @param number $category
	 * @param number $count
	 */
	public function serverside($category, $start = 0, $count = 3){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Article_Model', 'a');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('Category_Model', 'c');
		
		$data['current_category'] = $category;
		//默认调取杂志分类下的信息
		$default_category = '0';
		$option = array();
		$option[] = array('data' => '1', 'field' => 'ctype', 'action' => 'where' );
		$option[] = array('data' => $default_category, 'field' => 'pid', 'action' => 'where' );
		$data['category_list'] = $this->c->getAll($option);
		
		$option = array();
		$ids = $this->c->get_category_ids($category);
		$option[] = array('data'=>$ids, 'field'=>'category','action'=>'where_in');
		$data['article_list'] = $this->a->getAll($option,$start,$count);
		
	}
	
	/**
	 * 文章详情页
	 * 
	 * @param int $article
	 */
	public function detail( $article ){
		$this->load->model('Article_Model','a');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('Category_Model','c');
		$this->load->model('Comment_Model', 't');
		$this->load->model('User_Model','u');
	
		$data = array();
		$data = $this->a->getById($article);
		$data['breadcrum'] = $this->c->get_breadcrum($data['category']);
		$this->click_addone($data, $article);
		
		$data['comment_list'] = $this->t->getCommentList($article);
		foreach ($data['comment_list'] as $k=>$v){
			$userinfo = $this->u->getById($v['userid']);
			$data['comment_list'][$k]['userinfo'] = $userinfo;
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
	
	private function click_addone($data, $id){
		$this->load->model('Article_Model', 'a');
		$updateData['click'] = $data['click'] + 1;
		$updateData['id'] = $id;
		$result = $this->a->update($updateData);
		
		return $result;
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