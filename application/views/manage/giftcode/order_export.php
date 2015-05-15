<?php $this->load->view('manage/giftcode/giftcode_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<form action="<?php echo base_url($this->config->item('adm_segment') . '/order/export'); ?>" method="post" accept-charset="utf-8" id="siteActivity" enctype="multipart/form-data">
		<div class="form-group">
			<p><label for="product">选择日期：</label><input type="text" class="form-control" name="orderDate" value="" id="orderDate" /></p>
		</div>
			<p><input type="submit" name="submitform" value="提交" id="submitform" class="btnSubmit"></p>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#orderDate").datepicker({
			dateFormat: 'yy-mm-dd'
		});

		$('#submitform').click(function(){
			if($('#orderDate').val() == ''){
				alert('请选择日期');
				return  false;
			}
		});
	});
</script>