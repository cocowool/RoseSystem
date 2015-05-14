<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum_Model extends MY_Model {
	public $table = 'r_fest_article';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'fid', 'comment'=>'大会ID', 'form'=> array('type'=>'select', 'option'=>array('type'=>'function', 'data'=>array(
					'model'=>'fest_model',
					'name'=>'get_all_fest',
					'parameter'=> array('0'),
			)))),
			array('name'=>'aid', 'comment'=>'杂志ID', 'form'=> array('type'=>'select', 'option'=>array('type'=>'function', 'data'=>array(
					'model'=>'article_model',
					'name'=>'getById',
					'parameter'=> array('0'),
			)))),
			array('name'=>'f_type', 'comment'=>'资源类型', 'form'=>array('type'=>'select', 
				'option'=>array('type'=>'static', 'data'=>array('1'=>'杂志','2'=>'影像')))
			),
			array('name'=>'f_title', 'comment'=>'自定标题', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入顾问姓名')),
			array('name'=>'f_thumb', 'comment'=>'缩略图', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入顾问姓名')),
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