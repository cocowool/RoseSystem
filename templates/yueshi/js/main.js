//网站主要JS文件 by shiqiang at 2015-03-30
$(document).ready(function(){
	
	$('.ys_ajaxmore a').click(function(){
		
		$.ajax({
			'type'	:	'POST',
			'url'	:	'/index/latest',
			'data'	:	{
				'count'	:	1
			},
			'success'	:	function(result){
				//console.log(result);
				var html = '';
				result = eval(result);
				$.each(result,function(n, value){
					html += '<div class="col-md-4"><div class="ys_thumbnail_block">';
					html += '<a href="javascript:void(0);"><img src="' + value.img + '" /></a>';
					html += '<div class="ys_caption"><h3><a href="javascript:void(0);">' + value.title + '</a></h3>';
					html += '<p>' + value.content + '</p></div></div></div>';
				});
				
				html = '<div class="row ys_latest">' + html + '</div>';
				$('.ys_latest:last').after(html);
			}
		});
	});
});