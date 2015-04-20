<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点栏目管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Barcode_Model extends MY_Model {
	public $table = 'r_barcode';
	public $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
		array('name'=>'b_name', 'comment'=>'名称','form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入名称')),
		array('name'=>'cover', 'comment'=>'文章封面配图', 'type' => 'file'),	
		array('name'=>'resource', 'comment'=>'资源', 'allowHTML' => TRUE, 'notintable' => TRUE),	
		array('name'=>'status', 'comment'=>'状态', 'options' => array('0' => '草稿', '1' => '已发布' ), 'invisible' => TRUE ),	
		array('name'=>'create_at', 'comment'=>'创建时间'),	
		array('name'=>'update_at', 'comment'=>'更新时间', 'invisible' => TRUE),
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();
		
		$this->load->model('category_model', 'c');
		$this->fields[2]['options'] = $this->c->get_all_category(0, 0);
	}
}