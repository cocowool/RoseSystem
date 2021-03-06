<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chef_Model extends MY_Model {
	public $table = 'r_chef';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'s_url', 'comment'=>'URL别称', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入URL别称，将可以通过/chef/chiken的方式访问')),
			array('name'=>'s_title', 'comment'=>'菜品名称', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入商品的名称')),
			array('name'=>'s_desc', 'comment'=>'菜品简介', 'form'=> array('type'=>'textarea', 'validation'=>'required', 'tips'=>'请输入菜品的简介')),
			array('name'=>'s_text', 'comment'=>'菜品详情', 'form'=> array('type'=>'textarea', 'validation'=>'required', 'tips'=>'请输入菜品的详情')),
			array('name'=>'s_thumb', 'comment'=>'菜品头图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_location', 'comment'=>'菜品头图存放位置' ),	//存储物理存储位置
			array('name'=>'s_youku', 'comment'=>'菜品视频', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入YOUKU链接，菜品的制作视频')),
			array('name'=>'s_pic1', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic2', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic3', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic4', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic5', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic6', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic7', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic8', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic9', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_pic10', 'comment'=>'高清图', 'form'=> array('type'=>'file', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'s_click', 'comment'=>'访问次数', 'form'=> array('type'=>'text')),
			array('name'=>'s_like', 'comment'=>'喜欢次数', 'form'=> array('type'=>'text')),
			array('name'=>'s_fav', 'comment'=>'收藏次数', 'form'=> array('type'=>'text')),
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