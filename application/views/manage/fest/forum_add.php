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
	$('.ys-resource-container').on('click', function(e){
		if($(e.target).hasClass('ys-resource')){
			$('#f_thumb').val($(e.target).attr('src'));
		}		
	});

	$('.ys-article-lists .media-list').on('click',function(e){
		if($(e.target).hasClass('article-title')){
			$('#f_title').val($(e.target).html());
			$('#aid').val($(e.target).data('id'));
			$.ajax({
				'type'	:	'POST',
				'dataType'	:	'json',
				'url'	:	'/manage/resource/ajaxGet',
				'data'	:	{
					'aid'	:	$(e.target).data('id')
				},
				'success':function(result){
					$('.ys-resource-container').html('');
					if(result.length == 0){
						$('.ys-resource-container').html("没有图片资源");
					}else{
						$.each(result,function(k,v){
							$('.ys-resource-container').append("<div class='col-md-6'><div class='thumbnail'><a href='javascript:void(0);'><img class='ys-resource' src='"+v.web_path+"' /></a></div></div>");
						});
					}
				
				}
			});
		}
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

	$('#f_type').change(function(){
		$.ajax({
			'type'	:	'POST',
			'dataType'	:	'json',
			'url'	:	'/manage/category/ajaxGet',
			'data'	:	{
				'f_type'	:	$(this).val()
			},
			'success'	:	function(result){
				console.log(result);
				$('#category_id').find('option').remove();
				$.each(result,function(k,v){
					$('#category_id').append('<option value="'+v.key+'">'+v.val+'</option>');
				});
			}
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
							cover = "<div class='media-left'><a href='javascript:void(0);' data-id='"+v.id+"'><img class='media-object' src='"+v.cover+"'></a></div>";
 						}
						$('.ys-article-lists .media-list').append("<li class='media'>"+cover+"<div class='media-body'><a class='article-title'  data-id='"+v.id+"' href='javascript:void(0);'>"+v.name+"</a></div></li>");
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
.ys-article-lists { border:1px solid #ececec;  padding:0.5em;
height:auto; max-height:200px; overflow:auto; }
.ys-resource-container {
	height:auto; max-height:200px; overflow:auto; 
}
</style>