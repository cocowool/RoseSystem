<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chef extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index($id = ''){
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
		
		$this->load->view('chef/detail', $data);
	}
}