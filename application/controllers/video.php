<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($category = 0, $page = 0){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Video_Model', 'v');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$data['current_category'] = $category;
		$data['page'] = $page;
		//默认调取杂志分类下的信息
		$default_category = '0';
		$option = array();
		$option[] = array('data' => '2', 'field' => 'ctype', 'action' => 'where' );
		$option[] = array('data' => 0, 'field' => 'pid', 'action' => 'where' );
		$data['category_list'] = $this->c->getAll($option);
		
		$option = array();
		$ids = $this->c->get_category_ids($category);
		$option[] = array('data'=>$ids, 'field'=>'v_category','action'=>'where_in');
		$data['video_total'] = $this->v->getTotal($option);
		$data['video_list'] = $this->v->getAll($option, $page, 4, 'v_sort','desc');
		
		$this->load->library('pagination');
		$config['base_url'] = '/video/index/'.$category.'/';
		$config['total_rows'] = $data['video_total'];
		$config['uri_segment'] = 4;
		$config['per_page'] = 8;
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
		
		$this->load->view('video/list', $data);
	}
	
	/**
	 * 用户点击后更新喜欢与收藏次数
	 *
	 * @param number $id
	 */
	public function feedback($type = 'like', $id){
		switch ($type){
			case 'like':
				$type = 'v_like';
				break;
			case 'fav':
				$type = 'v_fav';
				break;
		}
		
		$this->load->model('Video_Model', 'v');
		$article = $this->v->getById($id);
		$data['id'] = $id;
		$data[$type] = $article[$type] + 1;
		$result = $this->v->update($data, $id);
	
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

	public function serverside(){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Video_Model', 'a');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('Category_Model', 'c');
	
		$category = $this->input->post('category');
		$pagesize = $this->input->post('pagesize');
		$start = $this->input->post('start');
		//默认调取杂志分类下的信息
		if(empty($category)){
			$category = '0';
		}
		$option = array();
		$option[] = array('data' => '2', 'field' => 'ctype', 'action' => 'where' );
		$option[] = array('data' => $category, 'field' => 'pid', 'action' => 'where' );
		$data['category_list'] = $this->c->getAll($option);
	
		$option = array();
		$ids = $this->c->get_category_ids($category);
		$option[] = array('data'=>$ids, 'field'=>'v_category','action'=>'where_in');
		$result = $this->a->getAll($option,$start,$pagesize);
	
		echo json_encode($result);
	}
	
	public function detail($id){
		$this->load->model('Video_Model','v');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('Category_Model','c');
		$this->load->model('Comment_Model', 't');
		$this->load->model('User_Model','u');
	
		$data = array();
		$data = $this->v->getById($id);
		$data['breadcrum'] = $this->c->get_breadcrum($data['v_category']);
		$this->click_addone($data, $id);
		
		$data['comment_list'] = $this->t->getCommentList($id);
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
	
		$data['related_video'] = $this->realted_video($data['v_category'], $data['id']);
		$data = array_merge($data, $this->getPubData());
		
		$this->load->view('video/detail', $data);
	}
	
	private function click_addone($data, $id){
		$this->load->model('Video_Model', 'a');
		$updateData['v_click'] = $data['v_click'] + 1;
		$updateData['id'] = $id;
		$result = $this->a->update($updateData);
	
		return $result;
	}
	
	private function realted_video($cid, $id = ''){
		$this->load->model('Video_Model','v');
		$option = array();
		$option[] = array( 'data' => $cid, 'field' => 'v_category', 'action' => 'where' );
		if( !empty($id) ){
			$option[] = array( 'data' => $id, 'field' => 'id !=', 'action' => 'where' );
		}
		$data = $this->v->getAll($option, 0, 1000);
	
		if( empty($data) ){
			return false;
		}
	
		return $data;
	}
	
}