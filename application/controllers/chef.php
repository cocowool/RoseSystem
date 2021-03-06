<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chef extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index($page = '0'){
		$data = array();
		$data = array_merge($data, $this->getPubData());

		$this->load->model('Chef_Model','c');
		$data['chef_total'] = $this->c->getTotal();
		$data['chef_list'] = $this->c->getAll();
		
		$this->load->library('pagination');
		$config['base_url'] = '/chef/index/';
		$config['total_rows'] = $data['chef_total'];
		$config['uri_segment'] = 3;
		$config['per_page'] = 10;
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
		
		$this->load->view('chef/list', $data);
	}
	
	public function detail($id){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		
		$this->load->model('Chef_Model','c');
		$data['chef_list'] = $this->c->getAll();
		
		foreach ($data['chef_list'] as $k=>$v){
			if($v['id'] == $id or $v['s_url'] == $id){
				$data['current_chef'] = $v;
			}
		}
		
		if(!isset($data['current_chef'])){
			$data['current_chef'] = $data['chef_list'][0];
		}
		$data['focus_html'] = $this->get_focus_html($data['current_chef']);
		
		$this->load->view('chef/detail', $data);
	}
	
	private function get_focus_html($data){
		$imglist = array();
		for($i=1;$i<11;$i++){
			if(isset($data["s_pic$i"]) and !empty($data["s_pic$i"])){
				$imglist[] = $data["s_pic$i"];
			}
		}
		
		return $imglist;
// 		$html = '';
// 		$html .= '<div id="carousel-example-generic" class="carousel slide ys_homefocus" data-ride="carousel">';
// 		$html .= '<ol class="carousel-indicators">';
		
// 		foreach ($imglist as $k=>$v){
// 			$html .= '<li data-target="#carousel-example-generic" data-slide-to="'.$k.'" class=""></li>';
// 		}
		
// 		$html .= '</ol><div class="carousel-inner" role="listbox">';		
		
// 		foreach ($imglist as $k=>$v){
// 			$html .= '<div class="item">';
// 			$html .= '<img data-src="" alt="SLIDE" src="'.$v.'" data-holder-rendered="false">';
// 			$html .= '</div>';
// 		}
// 		$html .= '</div>';
// 		$html .= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">';
// 		$html .= '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
// 		$html .= '<span class="sr-only">Previous</span></a>';
// 		$html .= '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">';
// 		$html .= '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>';
		
// 		return $html;
	}
}