<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Useraction_Model extends MY_Model {
	protected $table = 'r_useraction';
	protected $id	=	'id';
	protected $fields = array(
			array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE),
			array('name'=>'userid', 'comment'=>'用户ID'),
			array('name'=>'ctype', 'comment'=>'资源类型'),
			array('name'=>'cid', 'comment'=>'资源ID'),
			array('name'=>'caction', 'comment'=>'用户动作'),
			array('name'=>'insert_time', 'comment'=>'创建时间'),
			array('name'=>'update_time', 'comment'=>'更新时间', 'invisible' => TRUE ),
	);

	function __construct(){
		parent::__construct();
	}

	public function check_useraction($data){
		$option = array();
		$option[] = array('data' => $data['userid'], 'field' => 'userid', 'action' => 'where');
		$option[] = array('data' => $data['ctype'], 'field' => 'ctype', 'action' => 'where');
		$option[] = array('data' => $data['cid'], 'field' => 'cid', 'action' => 'where');
		$option[] = array('data' => $data['caction'], 'field' => 'caction', 'action' => 'where');
		
		$result = $this->getAll($option);
		
		if(count($result)>=1){
			return true;
		}else{
			return false;
		}
	}
}