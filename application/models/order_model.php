<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_Model extends MY_Model {
	public $table = 'r_order';
	public $id	=	'id';
	public $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
			array('name'=>'product', 'comment'=>'礼品名称', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入礼品的名称')),
			array('name'=>'shopaddress', 'comment'=>'礼品ID', 'form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入礼品ID')),
			array('name'=>'payment', 'comment'=>'礼券序列号', 'form'=> array('type'=>'text', 'validation'=>'required')),
			array('name'=>'express', 'comment'=>'快递单号', 'form'=> array('type'=>'text', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
			array('name'=>'nofity', 'comment'=>'发货通知', 'form'=> array('type'=>'text', 'validation'=>'required', 'edit'=>'img') ),	//存储WEB访问调用地址
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