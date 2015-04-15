<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  公共Controller
 * 
 */
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		//校验是否为后台登录地址，后台登陆校验后台用户登录情况，前台地址校验前台用户登录情况
		if( $this->isBackend() ){
			$this->backendAuthCheck();
		}

	}

	public function isBackend(){
		if( $this->uri->segment(1) == $this->config->item('adm_segment') && $this->uri->segment(2) != $this->config->item('adm_segment_auth') ){
			return TRUE;
		}
		
		return FALSE;
	}

	public function backendAuthCheck(){
		$tag_username = $this->config->item('adm_sess_username');
		
		if( !$this->session->userdata($tag_username) ){
			redirect('/'.$this->config->item('adm_segment').'/'.$this->config->item('adm_segment_auth'));
		}
		
		return TRUE;
	}

	/**
	 * 获取控制器中一些公共数据
	 */
	protected function getPubData(){
		$data = array();
		$data['tie'] = rand(1,3);	//随机首页的丝带图标
		
		return $data;
	}
	
	public function generate_edit_form($data,$model,$action){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->config('sysconfig');
		
		$html_form = '';
		$html_form .= form_open_multipart($action, array('id' => 'rsAddForm') );
		
		foreach ($model->fields as $k=>$v){
			if(!isset($v['form']))	continue;
			$validation = '';
			if(isset($v['form']['validation'])){
				$validation = '<b>*</b>';
			}
			$error_class = '';
			switch ($v['form']['type']){
				case 'primary':
					break;
				case 'text':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_input( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> $data[$v['name']], 'class'=>'form-control', 'placeholder'=>(isset($v['form']['tips'])?$v['form']['tips']:'') ) );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'textarea':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_textarea( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> $data[$v['name']], 'class'=>'form-control', 'placeholder'=>(isset($v['form']['tips'])?$v['form']['tips']:'') ) );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'select':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$options = '';
					switch ($v['form']['option']['type']){
						case "function":
							$this->load->model($v['form']['option']['data']['model'], 'rsD');
							$options = @call_user_method($v['form']['option']['data']['name'], $this->rsD, $v['form']['option']['data']['parameter']);
							break;
						case "static":
							$options = $v['form']['option']['data'];
							break;
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_dropdown( $v['name'],  $options, $data[$v['name']], 'class="form-control"' );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'file':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_upload( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> $data[$v['name']] ) );
					$html_form .= form_error($v['name']) . '</div>';
					
					switch ($v['form']['edit']){
						case 'img':
							$html_form .= '<div class="form-group"><a href="javascript:void(0);"><img src="' . $data[$v['name']] . '" height="50" /></a></div>';
							break;
					}
					break;
			}
		}
		
		$html_form .= form_submit(array('name'=>'rsSubmit', 'id'=>'rsSubmit', 'value'=>'保存', 'class' => 'btn btn-default'));
		$html_form .= form_close();
		return $html_form;		
	}
	
	/**
	 * 根据用户的数据模型生成对应的表单
	 * 
	 * @param string $model
	 * @param string $action
	 * @return string
	 */
	public function generate_add_form($model, $action){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->config('sysconfig');
		
		$html_form = '';
		$html_form .= form_open_multipart($action, array('id' => 'rsAddForm') );

		foreach ($model->fields as $k=>$v){
			if(!isset($v['form']))	continue;
			$validation = '';
			if(isset($v['form']['validation'])){
				$validation = '<b>*</b>';
			}
			$error_class = '';
			switch ($v['form']['type']){
				case 'primary':
					break;
				case 'text':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_input( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name']), 'class'=>'form-control', 'placeholder'=>(isset($v['form']['tips'])?$v['form']['tips']:'') ) );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'textarea':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_textarea( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name']), 'class'=>'form-control', 'placeholder'=>(isset($v['form']['tips'])?$v['form']['tips']:'') ) );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'select':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$options = '';
					switch ($v['form']['option']['type']){
						case "function":
							$this->load->model($v['form']['option']['data']['model'], 'rsD');
							$options = @call_user_method($v['form']['option']['data']['name'], $this->rsD, $v['form']['option']['data']['parameter']);
							break;
						case "static":
							$options = $v['form']['option']['data'];
							break;
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_dropdown( $v['name'],  $options, set_value($v['name']), 'class="form-control"' );
					$html_form .= form_error($v['name']) . '</div>';
					break;
				case 'file':
					if(form_error($v['name'])){
						$error_class = ' has-error';
					}
					$html_form .= '<div class="form-group' . $error_class . '">' . form_label($v['comment'], $v['name']) .$validation .  form_upload( array('name'=>$v['name'], 'id'=>$v['name'], 'value'=> set_value($v['name']) ) );
					$html_form .= form_error($v['name']) . '</div>';
					break;
			}
		}
		
		$html_form .= form_submit(array('name'=>'rsSubmit', 'id'=>'rsSubmit', 'value'=>'保存', 'class' => 'btn btn-default'));
		$html_form .= form_close();
		return $html_form;
	}
}