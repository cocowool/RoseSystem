<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_Model extends MY_Model {
	public $table = 'r_video';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'v_title', 'comment'=>'视频名称', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入视频的名称')),
			array('name'=>'v_category', 'comment'=>'视频分类'),
			array('name'=>'v_desc', 'comment'=>'视频简介', 'form'=> array('type'=>'textarea', 'validation'=>'required', 'tips'=>'请输入视频简介')),
			array('name'=>'v_youku', 'comment'=>'优酷链接', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入优酷链接')),
			array('name'=>'v_thumb', 'comment'=>'视频缩略图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'v_location', 'comment'=>'视频存放位置' ),	//存储物理存储位置
			array('name'=>'v_click', 'comment'=>'访问次数', 'form'=> array('type'=>'text')),
			array('name'=>'v_like', 'comment'=>'喜欢次数', 'form'=> array('type'=>'text')),
			array('name'=>'v_fav', 'comment'=>'收藏次数', 'form'=> array('type'=>'text')),
			array('name'=>'status', 'comment'=>'状态', 'form'=>array('type'=>'select', 'option'=>array('type'=>'static', 'data'=>array('0'=>'草稿','1'=>'已发布') )), 'invisible' => TRUE),
			array('name'=>'insert_time', 'comment'=>'创建时间'),
			array('name'=>'update_time', 'comment'=>'更新时间'),
			array('name'=>'operation', 'comment'=>'操作'),
	);

	function __construct(){
		parent::__construct();
	}

}