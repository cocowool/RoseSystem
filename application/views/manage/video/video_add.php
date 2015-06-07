<?php 
if($ctype == 1){
	$this->load->view('manage/article/article_submenu'); 
}else{
	$this->load->view('manage/video/video_submenu'); 
}
?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<?php echo $html_form; ?>
	</div>
</div>