<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_Model extends MY_Model {
	public $table = 'r_video';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
			array('name'=>'v_title', 'comment'=>'视频名称', 'form'=> array('type'=>'text'), 'validation'=>array('required') ),
			array('name'=>'v_category', 'comment'=>'视频分类'),
			array('name'=>'v_desc', 'comment'=>'视频简介', 'form'=> array('type'=>'text')),
			array('name'=>'v_thumb', 'comment'=>'视频缩略图', 'form'=> array('type'=>'text')),
			array('name'=>'v_click', 'comment'=>'访问次数', 'form'=> array('type'=>'text')),
			array('name'=>'v_like', 'comment'=>'喜欢次数', 'form'=> array('type'=>'text')),
			array('name'=>'v_fav', 'comment'=>'收藏次数', 'form'=> array('type'=>'text')),
			array('name'=>'v_youku', 'comment'=>'优酷链接', 'form'=> array('type'=>'text')),
			array('name'=>'status', 'comment'=>'状态', 'form'=>array('type'=>'select', 'options'=>array('0'=>'草稿','1'=>'已发布')), 'invisible' => TRUE),
			array('name'=>'insert_time', 'comment'=>'创建时间'),
			array('name'=>'update_time', 'comment'=>'更新时间', 'invisible' => TRUE ),
			array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);

	function __construct(){
		parent::__construct();
	}

}