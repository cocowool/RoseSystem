<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_Model extends MY_Model {
	protected $table = 'r_video';
	protected $id	=	'id';
	protected $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
			array('name'=>'v_title', 'comment'=>'视频名称'),
			array('name'=>'v_desc', 'comment'=>'视频简介'),
			array('name'=>'v_click', 'comment'=>'访问次数'),
			array('name'=>'v_youku', 'comment'=>'优酷链接'),
			array('name'=>'status', 'comment'=>'状态', 'invisible' => TRUE),
			array('name'=>'insert_time', 'comment'=>'创建时间'),
			array('name'=>'update_time', 'comment'=>'更新时间', 'invisible' => TRUE ),
			array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);

	function __construct(){
		parent::__construct();
	}

}