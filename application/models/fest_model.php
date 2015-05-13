<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fest_Model extends MY_Model {
	public $table = 'r_fest';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'f_year', 'comment'=>'大会年份', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入大会年份，四位数字')),
			array('name'=>'f_name', 'comment'=>'大会名称', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入本届大会名称或主题')),
			array('name'=>'f_desc', 'comment'=>'大会介绍', 'form'=> array('type'=>'textarea', 'validation'=>'required', 'tips'=>'请输入本届大会介绍')),
			array('name'=>'f_order', 'comment'=>'排序', 'form'=> array('type'=>'text')),
			array('name'=>'status', 'comment'=>'状态', 'form'=>array('type'=>'select', 
				'option'=>array('type'=>'static', 'data'=>array('0'=>'草稿','1'=>'已发布')))
			),
			array('name'=>'insert_time', 'comment'=>'创建时间'),
			array('name'=>'update_time', 'comment'=>'更新时间'),
			array('name'=>'operation', 'comment'=>'操作'),
	);

	function __construct(){
		parent::__construct();
	}
	
	public function get_all_fest($status = ''){
		$result = $this->getAll();
		$options = array();
		foreach ($result as $k=>$v){
			$options[$v['id']] = $v['f_year'];
		}
		
		return $options;
	}

}