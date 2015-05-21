<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends My_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	
	public function index(){
		$data = array();
		$data = array_merge($data, $this->getPubData());
		
		$this->load->model('top_model', 't');
		$this->load->model('focus_model','f');
		$option = array();
		$option[] = array('data' => '1', 'field' => 'status', 'action' => 'where' );
		$data['focus_list'] = $this->f->getAll($option, 0, 999, 'f_order', 'asc');
		
		$option = array();
		$option[] = array('data' => '1', 'field' => 'status', 'action' => 'where' );
		$data['top_list'] = $this->t->getAll($option, 0, 3, 'f_order', 'asc');
		
		$this->load->view('index', $data);
	}
	
	public function test(){
		$data = array();
		$this->load->view('test', $data);
	}
	
	/**
	 * 返回首页最新的几条文章
	 */
	public function latest(){
		
		
		$data = array(
			array(
				'title'		=>	'炉火纯青',
				'content'	=>	'为各位火腿爱好者度身定制的『悦食中国』圣诞火腿礼包，中西双腿合璧的“圣诞二重奏”，带给你最独特的欢乐赏味体验。',
				'img'		=>	'/temp/tb4.png',
			),	
			array(
				'title'		=>	'饕餮盛宴',
				'content'	=>	'Joselito小何塞火腿（70克）上蒋火腿（500克）《悦食Epicure》11月号火腿博物馆保存版、悦食赏味期限章、致火腿爱好者明信片、圣诞月历',
				'img'		=>	'/temp/tb5.png',
			),	
			array(
				'title'		=>	'斗转星移',
				'content'	=>	'遵循古法手工，同时努力完善加工技艺。希望以更现代便捷的方式品鉴传统风味之美。所有食材皆自产地直送。咸甜苦辣，尽享湖南滋味。',
				'img'		=>	'/temp/tb6.png',
			),	
		);
		
		echo json_encode($data);
	}
}