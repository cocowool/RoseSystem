<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giftcode extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data = array();
	
		$data['content_view'] = 'manage/giftcode/giftcode_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);
	}
	
	public function orderexport(){
		$data = array();
		$this->load->model('Order_Model','o');
		$this->load->model('Address_Model','s');
		$this->load->model('Giftcode_Model','g');
		$this->lang->load('form_validation', 'chinese');
		$config = array(
			array(
					'field'	=>	'startDate',
					'label'	=>	'开始日期',
					'rules'	=>	'trim|required'
			),
			array(
					'field'	=>	'endDate',
					'label'	=>	'结束日期',
					'rules'	=>	'trim|required'
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE){
			$data['content_view'] = 'manage/giftcode/order_export';
			$data['content_data'] = $data;
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$this->load->helper('download');
			$this->load->dbutil();
			$data = $this->input->post(NULL, true);
		
			$option[] = array('data' => $data['startDate'], 'field' => 'create_at >=', 'action' => 'like');
			$option[] = array('data' => $data['endDate'], 'field' => 'create_at <=', 'action' => 'like');
			$result = $this->o->getAll($option);
			$csv = array();
			$csv[0] = array('日期','礼品卡号', '密码', '产品', '姓名', '手机', '地址');
			foreach ($result as $k=>$v){
				$address = $this->s->getById($v['shopaddress']);
				$giftcode = $this->g->getById($v['payment']);
				$csv[$k+1][] = $v['create_at'];
				$csv[$k+1]['serialnumber'] = $giftcode['serialnumber'];
				$csv[$k+1]['password'] = $giftcode['password'];
				$csv[$k+1]['product'] = $v['product'];
				$csv[$k+1]['username'] = $address['cnname'];
				$csv[$k+1]['mobile'] = $address['mobile'];
				$csv[$k+1]['address'] = $address['address'];
			}
				
			$csv_data = '';
			foreach ($csv as $k=>$v){
				foreach ($v as $vv){
					$csv_data .= '"' . $vv . '",';
				}
				$csv_data = rtrim($csv_data);
				$csv_data .= "\r\n";
			}
				
			$name = 'order.csv';
			header("Content-type:text/csv;");
			header("Content-Disposition:attachment;filename=" . $name);
			header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
			header('Expires:0');
			header('Pragma:public');
			force_download($name, $csv_data);
		}
	}
	
	/**
	 * 处理用户的Ajax请求，返回对应的结果
	 * source区分用户获取的信息
	 * 1	礼券信息
	 * 2	订单信息
	 * 3	订货地址信息
	 */
	public function serverside(){
		$request = $this->input->post();
				
		if(!isset($request['source'])){
			$data = array();
			echo json_encode($data);
			return FALSE;
		}
		$source = $request['source'];
		switch ($source){
			case 1:
			default:
				$data = $this->getGiftcodeList($request);
				break;
			case 2:
				$data = $this->getOrderList($request);
				break;
		}
		
		echo json_encode($data);
	}
	
	private function getOrderList($request){
		$this->load->model('giftcode_model','g');
		$this->load->model('order_model','o');
		$this->load->model('address_model','a');
		$data = $this->o->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
			$address = $this->a->getById($v['shopaddress']);
			$giftcode = $this->g->getById($v['payment'],'serialnumber');
			$data['data'][$k]['serialnumber'] = isset($giftcode['serialnumber'])?$giftcode['serialnumber']:'';
			$data['data'][$k]['password'] = isset($giftcode['password'])?$giftcode['password']:'';
			$data['data'][$k]['cnname'] = $address['cnname'];
			
			$data['data'][$k]['operation'] = '<a href="/manage/giftcode/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
// 			$data['data'][$k]['operation'] .= '<a href="/manage/giftcode/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
		}
		
		return $data;
	}
	
	private function getGiftcodeList($request){
		$this->load->model('giftcode_model','s');
		$data = $this->s->dtRequest($request);
		//可以在此处进行返回数据的自定义处理
		foreach($data['data'] as $k=>$v){
// 			$data['data'][$k]['operation'] = '<a href="/manage/giftcode/edit/' . $v['id'] . '">编辑</a>&nbsp;&nbsp;';
// 			$data['data'][$k]['operation'] .= '<a href="/manage/giftcode/del/' . $v['id'] . '">删除</a>&nbsp;&nbsp;';
		}
		
		return $data;
	}
	
	
	public function export(){
		
	}
	
	public function order(){
		$data = array();
		
		$data['content_view'] = 'manage/giftcode/order_list';
		$data['content_data'] = $data;
		$this->load->view('manage/main', $data);		
	}
	
	public function add(){
		$data = array();
	
		$this->load->model('Store_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
				array(
					'field'	=>	's_title',
					'label'	=>	'商品名称',
					'rules'	=>	'trim|required'
				),
				array(
					'field'	=>	's_desc',
					'label'	=>	'商品简介',
					'rules'	=>	'trim|required'
				),
				array(
					'field'	=>	's_text',
					'label'	=>	'商品详情',
					'rules'	=>	'trim|required'
				)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
	
		if($this->form_validation->run() == FALSE){
			$data['html_form'] = $this->generate_add_form($this->s, 'manage/store/add');
			$data['content_view'] = 'manage/store/store_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$_POST['insert_time'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			//if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
			if ( ! $this->upload->do_upload( 's_thumb' ) ){
				$error = array('error' => $this->upload->display_errors());
				$data['content_data']['user_text'] = $error['error'];
				$this->redirectAction(FALSE, $data, '/manage/store', '/manage/store');
				return false;
			}else{
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['s_thumb'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
				$data['s_location'] = $updata['upload_data']['full_path'];
			}
				
			$result = $this->s->insert( $data );
			$this->redirectAction($result, $data, '/manage/store', '/manage/store/add');
		}
	}
		
	public function del($id = ''){
		$this->load->model('Store_Model','s');
		if(empty($id) && !$this->s->getById($id) ){
			$data['content_data']['text'] = '您所请求的数据不存在';
			$this->redirectAction(FALSE, $data, '/manage/store', '/manage/store');
		}
		
		$result = $this->s->delete($id);
		$this->redirectAction($result, $data, '/manage/store', '/manage/store');
	}
	
	public function edit($id){
		$data = array();
		
		$this->load->model('Store_Model','s');
		$this->lang->load('form_validation', 'chinese');
		$validations = array(
			array(
				'field'	=>	's_title',
				'label'	=>	'商品名称',
				'rules'	=>	'trim|required'
			),
			array(
				'field'	=>	's_desc',
				'label'	=>	'商品简介',
				'rules'	=>	'trim|required'
			),
			array(
				'field'	=>	's_text',
				'label'	=>	'商品详情',
				'rules'	=>	'trim|required'
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validations);
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if($this->form_validation->run() == FALSE){
			$data = $this->s->getById($id);
			$data['html_form'] = $this->generate_edit_form($data, $this->s, 'manage/store/edit/' . $id);
			$data['content_view'] = 'manage/store/store_add';
			$data['content_data'] = '';
			$this->load->view('manage/main', $data);
		}else{
			$this->load->helper('date');
			$data = $this->input->post(NULL, true);
				
			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
				
			//if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
			if ( $this->upload->do_upload( 's_thumb' ) ){
				$updata = array('upload_data' => $this->upload->data());
				//$data['v_thumb'] = $updata['upload_data']['sae_full_path'];
				$data['s_thumb'] = 'http://' . $_SERVER['SERVER_NAME'] . '/temp/' . $updata['upload_data']['file_name'];
				$data['s_location'] = $updata['upload_data']['full_path'];
			}
				
			$result = $this->s->update( $data, $data['id'] );
			$this->redirectAction($result, $data, '/manage/store', '/manage/store/'.$data['id']);
		}
		
	}
}