<?php $this->load->view('manage/fest/fest_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<?php echo $html_form; ?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	//判断用户选择的分类，加载数据
	loadCategory();

	$('#category_id').change(function(){
		$.ajax({
			'type'	:	'POST',
			'dataType'	:	'json',
			'url'	:	'/manage/article/ajaxGet',
			'data'	:	{
				'category'	:	$(this).val()
			},
			'success':function(result){
				console.log(result);
			}
		});
	});

	function loadCategory(){
		var f_type = $('#f_type').val();
		$.ajax({
			'type'	:	'POST',
			'dataType'	:	'json',
			'url'	:	'/manage/category/ajaxGet',
			'data'	:	{
				'f_type'	:	f_type
			},
			'success'	:	function(result){
				$.each(result,function(key,val){
					$('#category_id').append("<option value='"+val.key+"'>"+val.val+"</option>")
				});
			}
		});
	}
});
</script>