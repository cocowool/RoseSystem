<?php $this->load->view('manage/giftcode/giftcode_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<form action="<?php echo base_url($this->config->item('adm_segment') . '/giftcode/orderexport'); ?>" method="post" accept-charset="utf-8" id="siteActivity" enctype="multipart/form-data">
		<div class="form-group">
			<p><label for="startDate">开始日期：</label><input type="text" class="form-control" name="startDate" value="" id="startDate" /></p>
			<p><label for="endDate">开始日期：</label><input type="text" class="form-control" name="endDate" value="" id="endDate" /></p>
		</div>
			<p><input type="submit" name="submitform" value="提交" id="submitform" class="btn btn-default"></p>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#startDate").datepicker({
			dateFormat: 'yy-mm-dd'
		});
		$("#endDate").datepicker({
			dateFormat: 'yy-mm-dd'
		});

		$('#submitform').click(function(){
			if($('#startDate').val() == ''){
				alert('请选择日期');
				return  false;
			}
			if($('#endDate').val() == ''){
				alert('请选择日期');
				return  false;
			}
		});
	});
</script>