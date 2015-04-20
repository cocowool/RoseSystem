<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点资源管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Resource_Model extends MY_Model {
	public $table = 'r_source';
	public $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
		array('name'=>'aid', 'comment'=>'关联文章', 'form'=>array('type'=>'hidden')),
		array('name'=>'description', 'comment'=>'资源描述', 'form'=>array('type'=>'text')),	
		array('name'=>'author', 'comment'=>'作者', 'form'=>array('type'=>'text') ),	
		array('name'=>'sort', 'comment'=>'排序', 'form'=>array('type'=>'text')),	
		array('name'=>'tag', 'comment'=>'标签', 'form'=>array('type'=>'text')),	
		array('name'=>'padtop', 'comment'=>'上边距', 'form'=>array('type'=>'text')),	
		array('name'=>'padbottom', 'comment'=>'下边距', 'form'=>array('type'=>'text')),	
		array('name'=>'filename', 'comment'=>'文件名称', 'form'=>array('type'=>'text')),	
		array('name'=>'web_path', 'comment'=>'网页访问路径', 'form'=>array('type'=>'text')),	
		array('name'=>'path', 'comment'=>'保存路径', 'type' => 'file', 'invisible' => TRUE),	
		array('name'=>'status', 'comment'=>'状态', 'invisible' => TRUE, 'options' => array('0' => '草稿', '1' => '已发布' ) ),	
		array('name'=>'thumb', 'comment'=>'缩略图', 'allowHTML' => TRUE),
		array('name'=>'create_at', 'comment'=>'创建时间'),	
		array('name'=>'update_at', 'comment'=>'更新时间', 'invisible' => TRUE),
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();		
	}
	
	public function setHidden( $data ){
		foreach ($this->fields as $k => $v){
			foreach ($data as $kk=>$vv){
				if( $kk == $v['name'] ) {
					$v['hidden'] = $vv;
					$this->fields[$k] = $v;
				}
			}
		}
	}
}