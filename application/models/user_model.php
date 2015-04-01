<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends MY_Model {
	protected $table = 'r_user';
	protected $id	=	'id';
	protected $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
			array('name'=>'username', 'comment'=>'用户名'),
			array('name'=>'password', 'comment'=>'密码', 'invisible' => TRUE),
			array('name'=>'lastname', 'comment'=>'姓'),
			array('name'=>'firstname', 'comment'=>'名'),
			array('name'=>'gender', 'comment'=>'性别', 'options' => array('0' => '女士', '1' => '男士' )),
			array('name'=>'city', 'comment'=>'所在城市', 'invisible' => TRUE),
			array('name'=>'hometown', 'comment'=>'住址', 'invisible' => TRUE),
			array('name'=>'address', 'comment'=>'邮寄地址', 'invisible' => TRUE),
			array('name'=>'email', 'comment'=>'电子邮箱'),
			array('name'=>'mobile', 'comment'=>'手机号码'),
			array('name'=>'status', 'comment'=>'状态', 'invisible' => TRUE),
			array('name'=>'insert_time', 'comment'=>'创建时间'),
			array('name'=>'update_time', 'comment'=>'更新时间', 'invisible' => TRUE ),
			array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);

	function __construct(){
		parent::__construct();
	}

}