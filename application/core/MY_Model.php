<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function getField($field){
		foreach ($this->fields as $k=>$v){
			if($field == $v['name']){
				return $v;
			}
		}
		
		return false;
	}
	
	public function setField( $field ){
		$this->fields = array_merge($this->fields, $field);
	}
	
	public function setFieldParameter($name, $parameters){
		foreach ($this->fields as $k=>$v){
			if($name == $v['name']){
				$v['form']['option']['data']['parameter'] = $parameters;
				$this->fields[$k] = $v;
				return TRUE;
			}
		}
	}
	
	/**
	 * 根据ID取值，默认根据ID取
	 * 
	 * @param int $id
	 * @param string $field
	 * @param string $sort
	 * @param string $direction
	 */
	public  function getById($id, $field = '', $sort = '', $direction = '', $alwaysArray = false ){
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
		if(count($data) == 1 and !$alwaysArray){
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
				$sort = $request['columns'][$v['column']]['data'];
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
	
	public function update($data = array(), $id = '', $where = ''){
		$data = $this->filterInputArray($data);
		if( $where != '' ){
			$this->db->where($where, $id);
		}else{
			if( isset($data[$this->id])){
				$id = $data[$this->id];
				unset($data[$this->id]);
				$this->db->where($this->id, $id);
			}else{
				return false;
			}
		}
		
		return $this->db->update($this->table, $data);
		//return $this->db->affected_rows();
	}
	
	/**
	 * 删除数据库数据
	 * 
	 * @param int $id
	 * @param string $field
	 */
	public function delete($id, $field = ''){
		if( empty($field) && isset($this->id) ){
			$field = $this->id;
		}
		
		$this->db->where($field, $id);
		return $this->db->delete($this->table);
	}
	
	//根据数据表字段过滤
	function filterInputArray($data, $xss_clean = false, $table = '' ){
		if(empty($table)){
			$table = $this->table;
		}

		$fields = $this->db->list_fields($table);
		foreach($data as $k => $v){
			if( in_array($k, $fields) == false ){
				unset($data[$k]);
			}else{
				if($xss_clean == true) $data[$k] = $this->input->xss_clean($data[$k]);
			}
		}

		return $data;
	}
}
	