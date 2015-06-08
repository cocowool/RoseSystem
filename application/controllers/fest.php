<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fest extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index($year = ''){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		$this->load->model('Fest_Model', 'f');
		$this->load->model('Category_Model', 'c');
		$this->load->model('Resource_Model', 'r');
		$this->load->model('forum_model','fr');
		$this->load->model('carnival_model', 'ca');
		$this->load->model('consultant_model', 'ct');
		
		$option = array();
		$data['fest_total'] = $this->f->getTotal($option);
		$data['fest_list'] = $this->f->getAll($option);
		
		if(!empty($year)){
			$option[] = array('data'=>$year, 'field'=>'f_year','action'=>'or_where');
			$option[] = array('data'=>$year, 'field'=>'id','action'=>'or_where');
			
			$temp = $this->f->getAll($option);
			$data['current_fest'] = $temp[0];
		}else{
			$data['current_fest'] = $data['fest_list'][0];
		}
			
		//加载悦食论坛
		$option = array();
		$option[] = array('data'=>$data['current_fest']['id'], 'field'=>'fid','action'=>'where');
		$data['forum_list'] = $this->fr->getAll($option);
		
		//加载嘉年华
		$option = array();
		$option[] = array('data'=>$data['current_fest']['id'], 'field'=>'fid','action'=>'where');
		$data['carnival_list'] = $this->ca->getAll($option);
		
		//加载顾问
		$option = array();
		$option[] = array('data'=>$data['current_fest']['id'], 'field'=>'fid','action'=>'where');
		$data['consultant_list'] = $this->ct->getAll($option);
		
		$this->load->library('pagination');
		$config['base_url'] = '/fest/index/';
		$config['total_rows'] = $data['fest_total'];
		$config['uri_segment'] = 4;
		$config['per_page'] = 9;
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();
		
		$this->load->view('fest/detail', $data);
	}
}