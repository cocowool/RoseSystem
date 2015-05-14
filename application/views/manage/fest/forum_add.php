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
				$('#article').find('option').remove();
				if(result.length == 0){
					$('#article').append("<option value=''>该分类下没有文章</option>");
				}else{
					$.each(result,function(k,v){
						$('#article').append("<option value='"+v.id+"'>"+v.name+"</option>");
					});
				}
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