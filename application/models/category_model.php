<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 站点栏目管理
 * 
 * @author	shiqiang<cocowool@gmail.com>
 * @version	$Id$
 */
class Category_Model extends MY_Model {
	public $table = 'r_category';
	public $id	=	'id';
	public $fields = array(
		array('name'=>'id', 'comment'=>'序号', 'primary' => TRUE, 'form'=> array('type'=>'primary')),
		array('name'=>'category', 'comment'=>'栏目名称', 'form'=>array('type'=>'text','validation'=>'required','tips'=>'请填写分类栏目名称')),
		array('name'=>'pid', 'comment'=>'父栏目', 'form'=>array('type'=>'select', 'validation'=>'required',
				'option'=>array('type'=>'function', 'data'=>array(
					"model"=>"category_model",
					"name"=>"get_all_category",
					"parameter" => 0,
				)))),	
		array('name'=>'description', 'comment'=>'栏目描述', 'form'=>array('type'=>'text', 'tips'=>'填写META中的描述，做SEO用')),	
		array('name'=>'keywords', 'comment'=>'栏目关键词','form'=>array('type'=>'text', 'tips'=>'填写META中的关键词，做SEO用')),	
		array('name'=>'urltag', 'comment'=>'地址标志符'),	
		array('name'=>'create_at', 'comment'=>'创建时间'),	
		array('name'=>'update_at', 'comment'=>'更新时间'),
		array('name'=>'operation', 'comment'=>'操作', 'allowHTML' => TRUE),
	);
	
	function __construct(){
		parent::__construct();
		
		$this->fields[2]['options'] = $this->get_parent_category();
	}
	
	public function get_breadcrum($id, $category = 'article'){
		$breadcrum = '';
		$category = $this->getById($id);
		$breadcrum = "&nbsp;>&nbsp;<a href='/'.$category.'/list/" . $id . "'>".$category['category']."</a>";
		if( $category['pid'] != 0 ){
			$p_category = $this->get_breadcrum($category['pid']);
			$breadcrum = $p_category . $breadcrum;
		}else{
			if($category == 'article'){
				$breadcrum = "<a href='/'>首页</a>&nbsp;>&nbsp;<a href='/article'>杂志</a>" . $breadcrum;
			}else{
				$breadcrum = "<a href='/'>首页</a>&nbsp;>&nbsp;<a href='/video'>影像</a>" . $breadcrum;
			}
		}
		
		return $breadcrum;
	}
	
	/**
	 * 根据ID查找此分类以及子分类下所有ID数组
	 * 
	 * @param int $category_id
	 */
	public function get_category_ids($category_id){
		$ids = array();
		$ids[] = $category_id;
		$category = $this->getById($category_id, 'pid','pid','desc',true);
		if($category){
			foreach ($category as $k=>$v){
				$ids[] = $v['id'];
				$sub_ids = $this->get_category_ids($v['id']);
				if($sub_ids){
					$ids = array_merge($ids, $sub_ids);
				}
			}
		}

		return $ids;
	}
	
	/**
	 * 获取某一级别菜单列表
	 * 
	 * @param number $level
	 */
	public function get_parent_category($level = 0){
		$condition = array(
				array('field'=>'pid', 'data' =>'0', 'action'=>'where' ),
		);
		$result = $this->getAll($condition);
		
		$options = array();
		$options[0] = '一级分类';
		foreach ($result as $k=>$v){
			$options[$v['id']] = $v['category'];
		}
		
		return $options;
	}
	
	/**
	 * 获取所有栏目列表
	 */
	public function get_all_category( $pid = 0, $level = 0, $ctype = 1 ){
		$condition = array(
			array('field'=>'ctype', 'data' =>$ctype, 'action'=>'where' ),
			array('field'=>'pid', 'data' =>$pid, 'action'=>'where' ),
		);
		$result = $this->getAll($condition);
		
		$options = array();
		$options[0] = '一级分类';
		$prefix = '';
		foreach ($result as $k=>$v){
			$prefix = '';
			for($i=0;$i<$level;$i++){
				$prefix .= '-';
			}
			$options[$v['id']] = $prefix . $v['category'];
			$level+=2;
			$sub = $this->get_all_category($v['id'], $level);
			$options = $options + $sub;
			$level-=2;
		}
		
		return $options;
	}
}