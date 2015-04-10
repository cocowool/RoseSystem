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
		
		$data = $query->result_array();
		if(count($data) == 1){
			return $data[0];
		}else{
			return $data;
		}
	}
	
	/**
	 * 从数据库中获取结果数据集
	 *
	 * $condition	array( array('field'=>'', 'data' =>'', 'action'=>'' ) ) or string, 其中 action 指CI中数据库查询操作类型
	 *
	 **/
	public function getAll( $condition = array(), $start = 0, $pagesize = 500000, $sort = '', $direction = '' ){
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
	
	public function getTotal($condition= ''){
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
		
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	/**
	 * 接收DataTable格式的Ajax请求，响应对应的数据
	 * 
	 * @param array $request
	 */
	public function dtRequest($request = array()){
		$start = $request['start'];
		$length = $request['length'];
		$condition = (isset($request['condition']))?$request['condition']:'';

		$sort = ''; $direction = '';
		foreach ($request['order'] as $v){
			if($v['column'] != 0){
				$sort = $request['columns'][$v['column']]['name'];
				$direction = $v['dir'];
			}
		}
		
		$total = $this->getTotal($condition);
		$data = $this->getAll($condition, $start, $length,$sort,$direction);
		
		return array(
			'draw'	=>	$request['draw'],
			'recordsTotal'	=>	$total,
			'recordsFiltered'	=>	$total,
			'data'	=>	$data
		);
	}
	
	public function insert( $data = array() ){
		$data = $this->filterInputArray($data);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}
	