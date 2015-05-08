<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends My_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($category = '0', $page = '0'){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Video_Model', 'v');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$data['current_category'] = $category;
		//默认调取杂志分类下的信息
		$default_category = '0';
		$option = array();
		$option[] = array('data' => '2', 'field' => 'ctype', 'action' => 'where' );
		$option[] = array('data' => $default_category, 'field' => 'pid', 'action' => 'where' );
		$data['category_list'] = $this->c->getAll($option);
		
		$option = array();
		$ids = $this->c->get_category_ids($category);
		$option[] = array('data'=>$ids, 'field'=>'v_category','action'=>'where_in');
		$data['video_total'] = $this->v->getTotal($option);
		$data['video_list'] = $this->v->getAll($option, $page, 9);
		echo $this->db->last_query();
		
		$this->load->library('pagination');
		$config['base_url'] = '/video/index/'.$category.'/';
		$config['total_rows'] = $data['video_total'];
		$config['uri_segment'] = 4;
		$config['per_page'] = 9;
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();

		$this->load->view('video/list', $data);
	}
	
	public function detail($id){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Video_Model', 'v');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		
		$this->load->view('video/detail', $data);
	}
}