<?php $this->load->view('manage/chef/chef_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<?php echo $html_form; ?>
	</div>
</div>
<script type="text/javascript" src="/libs/ckeditor-4.4.7/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('s_desc', {
		language : 'en'
	});
	CKEDITOR.replace('s_text', {
		language : 'en'
	});
</script>