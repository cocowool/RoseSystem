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
	function loadResource(id){
		console.log(id);
	}

	$('.ys-article-lists .media-list').on('click',function(e){
		console.log('Article Click TEST');
		console.log(e);
	});
	
	//判断用户选择的分类，加载数据
	loadCategory();

	$('#article').change(function(){
		$.ajax({
			'type'	:	'POST',
			'dataType'	:	'json',
			'url'	:	'/manage/',
		});
	});

	var _this = this;
	$('#category_id').change(function(){
		$.ajax({
			'type'	:	'POST',
			'dataType'	:	'json',
			'url'	:	'/manage/article/ajaxGet',
			'data'	:	{
				'category'	:	$(this).val()
			},
			'success':function(result){
				$('.ys-article-lists .media-list').html('');
				if(result.length == 0){
					$('.ys-article-lists .media-list').html("该分类下没有文章");
				}else{
					$.each(result,function(k,v){
						var cover = '';
						if(v.cover != ''){
							cover = "<div class='media-left'><a href='javascript:void(0);'><img class='media-object' src='"+v.cover+"'></a></div>";
 						}
						$('.ys-article-lists .media-list').append("<li class='media'>"+cover+"<div class='media-body'><a class='article-title' href='javascript:void(0);'>"+v.name+"</a></div></li>");
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
<style type="text/css">
.ys-article-lists , .ys-resource-container { border:1px solid #ececec; padding:0.5em;  
height:auto; max-height:200px; overflow:auto; }
</style>