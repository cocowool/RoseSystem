<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 文章管理后台控制器
 * 
 * @author shiqiang
 *
 */
class Resource extends MY_Controller {
	private $home_url = '/resource/home';
	private $segment = 'resource';
	private $page_title = '文章资源管理';
	private $sae_domain = 's1';
	private $invisible_items = array('filename','author', 'tag', 'web_path',  'create_at','update_at', 'operation', 'thumb','filename', 'status');
	private $form_validate = array(
		array(
			'field'	=>	'aid',
			'label'	=>	'关联文章',
			'rules'	=>	'trim|required'
		)
	);
	
	public function __construct(){
		parent::__construct();

		$this->home_url = $this->config->item('adm_segment') . $this->home_url;
	}

	public function index($id, $page = 1, $pagesize = 10, $sort = 'sort', $direction = 'desc'){
		$this->load->model('Resource_Model','r');
		header('Content-type:text/html;charset=utf-8');
		
		if(empty($id)){
			echo 'Invalid Parameter.';
		}
		
		$option = array();
		$option[] = array( 'data' => $id, 'field' => 'aid', 'action' => 'where' );
		
		$total = $this->r->getTotal( $option );
		//做一下Page的转换，这里使用的起始位置
		$page = ( $page - 1 ) * $pagesize;
		$result = $this->r->getAll( $option, $page, $pagesize, $sort, $direction);
		
		//向结果中附加Operation的链接
		//附加资源的链接
		foreach ($result as $k=>$v){
			$v['thumb'] = '<img src="' . $v['web_path'] . '" height="80" />';
			$v['operation'] = '<a href="/article/resource/' . $v['id'] . '" target="_blank">查看图片</a>&nbsp;&nbsp;';			
			$v['operation'] .= '<a href="' . base_url( $this->config->item('adm_segment') . '/' . $this->segment . '/edit/'.$v['id']) . '">修改</a>
			<a href="' . base_url($this->config->item('adm_segment') . '/' . $this->segment . '/del/'.$v['id']) . '">删除</a>';
			$result[$k]	= $v;
		}
		
		echo json_encode( array('mydata'=> $result, 'totalItems' => $total, 'itemsPerPage' => $pagesize, 'itemIndexStart' => $page ) );
	}
	
	
	public function home($id){
		$this->load->model('Resource_Model','r');
		
		$data = array();
		$data['column'] = $this->r->getColumn();
		$data['tblTitle'] = '文章资源列表';
		$data['page_title'] = $this->page_title;
		$data['aid'] = $id;
		
		$this->load->view('manage/resource/resource_list', $data);
	}
	
	/**
	 * 增加一条新的栏目
	 */
	public function add( $aid = '' ){
		$this->load->model('Resource_Model','r');
		$this->lang->load('form_validation', 'chinese');
		$config = $this->form_validate;
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		
		$hidden = array(
			'aid'	=>	$aid,
		);
		$this->r->setHidden($hidden);
		
		if($this->form_validation->run() == FALSE){
			$data['title']	=	'添加页面';
			//设置不需要用户输入项目
			$invisible = $this->invisible_items;
			$data['html_form'] = $this->r->get_add_form( 'siteResource',  $this->config->item('adm_segment') . '/' . $this->segment . '/add', TRUE, $invisible );
			$this->load->view('manage/resource/resource_edit',$data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);

			$config = $this->config->item('image_upload_config');
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->sae_upload( $this->sae_domain, 'path')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				die('Upload Failed');
			}else{
				$updata = array('upload_data' => $this->upload->data());
				$data['filename'] = $updata['upload_data']['file_name'];
				$data['web_path'] = $updata['upload_data']['sae_full_path'];
				$data['path'] = $updata['upload_data']['full_path'];
			}
		
			$result = $this->r->insertMethod( $data );
			if( $result ){
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url . '/' . $data['aid'];
				$data['content'] = "操作成功，正在跳转";
				$data['timeout'] = 2000;
				$this->load->view('manage/include/sys_msg', $data);
			}else{
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url . '/' . $data['aid'];
				$data['timeout'] = 2000;
				$data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
				$this->load->view('manage/include/sys_msg', $data);
			}
		}		
	}

	/**
	 * 更新内容
	 *
	 * @param int $id
	 */
	public function edit( $id ){
		$this->load->model('Resource_Model','r');
		$this->lang->load('form_validation', 'chinese');
		$config = $this->form_validate;
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
	
		$result = $this->r->getById($id);
		if( !$result ){
			$data['title'] = "系统提示";
			$data['url'] = base_url() . $this->home_url . '/' . $data['aid'];
			$data['timeout'] = 2000;
			$data['content'] = "<p style='color:red; font-weight:bold;'>请求修改的数据不存在</p>";
			$this->load->view('manage/include/sys_msg', $data);
		}else{
			$data['result'] = $result;
		}
	
		if($this->form_validation->run() == FALSE){
			$data['title']	=	'修改页面';
			//设置不需要用户输入项目
			$invisible = $this->invisible_items;
			$data['html_form'] = $this->r->get_edit_form( $result, 'siteCategory', $this->config->item('adm_segment') . '/' . $this->segment . '/edit/'.$id, TRUE, $invisible );
	
			$this->load->view('manage/article/article_edit',$data);
		}else{
			$this->load->helper('date');
			$_POST['create_at'] = unix_to_human( local_to_gmt(), TRUE, 'eu');
			$data = $this->input->post(NULL, true);
	
			$result = $this->r->updateMethod( $data, $id );
			if( $result ){
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url . '/' . $data['aid'];
				$data['content'] = "操作成功，正在跳转";
				$data['timeout'] = 2000;
				$this->load->view('manage/include/sys_msg', $data);
			}else{
				$data['title'] = "系统提示";
				$data['url'] = base_url() . $this->home_url . '/' . $data['aid'];
				$data['timeout'] = 2000;
				$data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
				$this->load->view('manage/include/sys_msg', $data);
			}
		}
	}	
	
	/**
	 * 内容的删除方法
	 * @param int $id
	 */
	public function del($id){
		$this->load->model('Resource_Model','r');
		$data = $this->r->getById($id);
		if( !$data ){
			$page_data['title'] = "系统提示";
			$page_data['url'] = base_url() . $this->home_url;
			$page_data['timeout'] = 6000;
			$page_data['content'] = "<p style='color:red; font-weight:bold;'>请求修改的数据不存在</p>";
			$this->load->view('manage/include/sys_msg', $page_data);
		}else{
			$page_data['result'] = $data;
		}
	
		$result = $this->r->deleteMethod($id);
		if( $result ){
			$page_data['title'] = "系统提示";
			$page_data['url'] = base_url() . $this->home_url . '/' . $data['aid'];
			$page_data['content'] = "操作成功，正在跳转";
			$page_data['timeout'] = 6000;
			$this->load->view('manage/include/sys_msg', $page_data);
		}else{
			$page_data['title'] = "系统提示";
			$page_data['url'] = base_url() . $this->home_url . '/' . $data['aid'];
			$page_data['timeout'] = 6000;
			$page_data['content'] = "<p style='color:red; font-weight:bold;'>操作失败，请联系管理员</p>";
			$this->load->view('manage/include/sys_msg', $page_data);
		}
	}	
}