<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top_Model extends MY_Model {
	public $table = 'r_top';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'f_title', 'comment'=>'名称', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入名称')),
			array('name'=>'f_desc', 'comment'=>'简介', 'form'=> array('type'=>'textarea', 'validation'=>'required', 'tips'=>'请输入简介')),
			array('name'=>'f_link', 'comment'=>'链接', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入链接')),
			array('name'=>'f_img', 'comment'=>'图片', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'f_click', 'comment'=>'访问次数'),
			array('name'=>'f_like', 'comment'=>'喜欢次数'),
			array('name'=>'f_fav', 'comment'=>'收藏次数'),
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

}