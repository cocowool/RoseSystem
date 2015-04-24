<?php 
switch($category_type){
	case 1:
	default:
		$this->load->view('manage/article/article_submenu'); 
		break;
	case 2:
		$this->load->view('manage/video/video_submenu'); 
		break;
}
?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<?php echo $html_form; ?>
	</div>
</div>