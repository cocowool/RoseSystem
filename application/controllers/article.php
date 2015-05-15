<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends My_Controller {

	public function __construct(){
		parent::__construct();
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
		$data['article_total'] = $this->a->getTotal($option);
		$data['article_list'] = $this->a->getAll($option, $page, 9);

		$this->load->library('pagination');
		$config['base_url'] = '/article/index/'.$category.'/';
		$config['total_rows'] = $data['article_total'];
		$config['uri_segment'] = 4;
		$config['per_page'] = 9;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] ='<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] ='<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] ='<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] ='<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] ='<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] ='<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();
		
		$this->load->view('article/list', $data);
	}
	
	/**
	 * 返回Ajax请求对应的数据
	 * @param number $category
	 * @param number $count
	 */
	public function serverside(){
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
	 * 用户点击后更新喜欢与收藏次数
	 * 
	 * @param number $id
	 */
	public function feedback($type = 'like', $id){
		$this->load->model('Article_Model', 'a');
		$article = $this->a->getById($id);
		$data['id'] = $id;
		$data[$type] = $article[$type] + 1;
		$result = $this->a->update($data, $id);
		
		if($result){
			$json = array(
				'errno'=>0,
				'errinfo'=>'更新成功',
				'count'=>$article[$type]+1,
			);
		}else{
			$json = array(
				'errno'=>'E500',
				'errinfo'=>'数据库更新失败',
				'count'=>$article[$type]+1,
			);
		}
		
		echo json_encode($json);
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