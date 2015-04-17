<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点栏目管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Article_Model extends MY_Model {
	public $table = 'r_article';
	public $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=>array('type'=>'primary')),
		array('name'=>'name', 'comment'=>'文章名称','form'=> array('type'=>'text', 'validation'=>'required', 'tips'=>'请输入文章标题')),
		array('name'=>'category', 'comment'=>'所属栏目', 'form'=>array('type'=>'select', 'option'=>array('type'=>'function', 'data'=>array(
				"model"=>"category_model",
				"name"=>"get_all_category",
				"parameter" => 0,
			)))),	
		array('name'=>'subtitle', 'comment'=>'文章副标题','form'=> array('type'=>'text', 'tips'=>'请输入文章副标题')),
		array('name'=>'foreword', 'comment'=>'引言','form'=> array('type'=>'textarea', 'tips'=>'请输入文章引言')),
		array('name'=>'author', 'comment'=>'作者','form'=> array('type'=>'text', 'tips'=>'请输入文章作者')),	
		array('name'=>'photographer', 'comment'=>'图片作者','form'=> array('type'=>'text', 'tips'=>'请输入图片作者')),	
		array('name'=>'others', 'comment'=>'其它作者', 'form'=> array('type'=>'text', 'tips'=>'请输入其他作者')),	
		array('name'=>'source', 'comment'=>'来源', 'form'=> array('type'=>'text', 'tips'=>'请输入文章来源')),	
		array('name'=>'sort', 'comment'=>'文章排序','form'=> array('type'=>'text', 'tips'=>'请输入排序顺序')),	
		array('name'=>'content', 'comment'=>'文章内容', 'form'=> array('type'=>'textarea','validation'=>'required', 'tips'=>'请输入文章内容') ),	
		array('name'=>'cover', 'comment'=>'文章封面配图', 'type' => 'file', 'invisible' => TRUE),	
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