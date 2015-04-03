<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 根据ID取值，默认根据ID取
	 * 
	 * @param int $id
	 * @param string $field
	 * @param string $sort
	 * @param string $direction
	 */
	public  function getById($id, $field = '', $sort = '', $direction = ''){
		
		if(empty($field) && !isset($this->id)){
			return FALSE;
		}
		
		if( empty($field) && isset($this->id) ){
			$field = $this->id;
		}
	
		$this->db->where($field, $id);
		if(!empty($sort) && !empty($direction)){
			$this->db->order_by($sort, $direction);
		}
		$query = $this->db->get($this->table);
		
		return $query->result_array();
	}
	
	/**
	 * 从数据库中获取结果数据集
	 *
	 * $condition	array( array('field'=>'', 'data' =>'', 'action'=>'' ) ) or string, 其中 action 指CI中数据库查询操作类型
	 *
	 **/
	function getAll( $condition = array(), $start = 0, $pagesize = 500000, $sort = '', $direction = '' ){
		if( !empty( $condition ) ){
			if( is_string($condition) ){
				$this->db->where("$condition");
			}else if( is_array($condition) ){
				foreach ($condition as $v){
					if( isset($v['data']) ){
						$this->db->$v['action']($v['field'], $v['data']);
					}
				}
			}
		}
	
		if( !empty($sort) && !empty($direction) ){
			$this->db->order_by( $sort, $direction );
		}
		$query = $this->db->get($this->table, $pagesize, $start);
		return $query->result_array();
	}	
}
	