<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_Model extends MY_Model {
	public $table = 'r_comment';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'ctype', 'comment'=>'评论类型', 'form'=>array('type'=>'select', 
				'option'=>array('type'=>'static', 'data'=>array('1'=>'杂志','2'=>'影像')))
			),
			array('name'=>'cid', 'comment'=>'资源ID', 'form'=>array('type'=>'text')),
			array('name'=>'userid', 'comment'=>'用户ID', 'form'=> array('type'=>'text', 'validation'=>'required')),
			array('name'=>'content', 'comment'=>'评论内容', 'form'=> array('type'=>'textarea', 'validation'=>'required')),
			array('name'=>'userip', 'comment'=>'用户IP', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入商品的简介')),
			array('name'=>'ua', 'comment'=>'UserAgent', 'form'=> array('type'=>'text', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'status', 'comment'=>'状态', 'form'=>array('type'=>'select', 
				'option'=>array('type'=>'static', 'data'=>array('0'=>'正常','1'=>'已删除')))
			),
			array('name'=>'insert_time', 'comment'=>'创建时间'),
			array('name'=>'update_time', 'comment'=>'更新时间'),
			array('name'=>'operation', 'comment'=>'操作'),
	);

	function __construct(){
		parent::__construct();
	}

	public function getCommentList($id, $ctype = '1'){
		if(empty($id)){
			return false;
		}
		
		$option = array();
		$option[] = array('data' => $id, 'field' => 'cid', 'action' => 'where');
		$option[] = array('data' => $ctype, 'field' => 'ctype', 'action' => 'where');
		
		return $this->getAll($option,0,99,'insert_time','desc');
	}
}