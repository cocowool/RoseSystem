<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index($page = '0'){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Store_Model', 's');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$option = array();
		$data['store_total'] = $this->s->getTotal($option);
		$data['store_list'] = $this->s->getAll($option, $page, 9);
		
		$this->load->library('pagination');
		$config['base_url'] = '/store/index/';
		$config['total_rows'] = $data['store_total'];
		$config['uri_segment'] = 4;
		$config['per_page'] = 9;
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();

		$this->load->view('store/list', $data);
	}

	public function detail($id){
		$this->load->model('Store_Model','s');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('Category_Model','c');
		$this->load->model('Comment_Model', 't');
		$this->load->model('User_Model','u');
		
		$data = array();
		$data = $this->s->getById($id);
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
		
		$data['related_store'] = $this->related_store($data['id']);
		$data = array_merge($data, $this->getPubData());
		
		$this->load->view('store/detail', $data);
	}
	
	private function related_store($id){
		$this->load->model("Store_Model","s");
		$data = $this->s->getById($id);
		
		$option = array();
		$option[] = array('data' => $id, 'field' => 'id !=', 'action' => 'where');
		$related_store = $this->s->getAll($option);
		
		return $related_store;
	}
	
	private function click_addone($data, $id){
		$this->load->model('Store_Model', 's');
		$updateData['s_click'] = $data['s_click'] + 1;
		$updateData['id'] = $id;
		$result = $this->s->update($updateData);
	
		return $result;
	}
	
	/**
	 * 用户点击后更新喜欢与收藏次数
	 *
	 * @param number $id
	 */
	public function feedback($type = 'like', $id){
		switch ($type){
			case 'like':
				$type = 's_like';
				break;
			case 'fav':
				$type = 's_fav';
				break;
		}
	
		$this->load->model('Store_Model', 's');
		$article = $this->s->getById($id);
		$data['id'] = $id;
		$data[$type] = $article[$type] + 1;
		$result = $this->s->update($data, $id);
	
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
}
