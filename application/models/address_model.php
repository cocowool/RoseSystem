<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address_Model extends MY_Model {
	public $table = 'r_shopaddress';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'cnname', 'comment'=>'客户姓名', 'form'=> array('type'=>'text', 'validation'=>'required')),
			array('name'=>'mobile', 'comment'=>'客户手机', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'')),
			array('name'=>'city', 'comment'=>'所在城市', 'form'=> array('type'=>'text', 'validation'=>'required')),
			array('name'=>'address', 'comment'=>'地址', 'form'=> array('type'=>'text', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'postcode', 'comment'=>'邮政编码', 'form'=> array('type'=>'text', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'status', 'comment'=>'状态', 'form'=>array('type'=>'select', 
				'option'=>array('type'=>'static', 'data'=>array('0'=>'草稿','1'=>'已发布')))
			),
			array('name'=>'create_at', 'comment'=>'创建时间'),
			array('name'=>'update_at', 'comment'=>'更新时间'),
			array('name'=>'operation', 'comment'=>'操作'),
	);

	function __construct(){
		parent::__construct();
	}

}