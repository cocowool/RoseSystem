//网站主要JS文件 by shiqiang at 2015-03-30
$(document).ready(function(){
	$('#loginBtn').click(function(){
		if($('#username').val() == ''){
			alert('请输入用户名');
			$('#username').focus();
			return false;
		}
		if($('#password').val() == ''){
			alert('请输入密码');
			$('#password').focus();
			return false;
		}
		
		$('#ys_login').submit();
	});
	
	$('.ys_btn_edit_user').click(function(){
		$('#editForm').submit();
	});
	
	$('#btnComment').click(function(){
		if($('#content').val() == ''){
			alert('请输入评论内容');
			$('#content').focus();
			return false;
		}
		if($('#verifycode').val() == ''){
			alert('请输入验证码');
			$('#verifycode').focus();
			return false;
		}
		
		$.ajax({
			type	:	'POST',
			url	:	'/comment/add',
			dataType	:	'json',
			data	:	$('#commentForm').serialize(),
			success	:	function(result){
				//alert(result);
				$('.ys_comment_list').prepend('test');
			},
			error : function(result){
				//alert(result);
				alert('评论提交失败');
			},
			beforeSend : function(){
				$('.ys_ajax_msg').html('正在提交');
			},
			complete : function(){
				$('.ys_ajax_msg').html('评论提交成功');
			}
		});
	});
	
	$('.ys_ajaxmore a').click(function(){
		$.ajax({
			'type'	:	'POST',
			'url'	:	'/article',
			'data'	:	{
				'count'	:	1
			},
			'success'	:	function(result){
				console.log($('.ys_article_list .hide').first().removeClass('hide  '));
				$('.ys_article_list .hide').first().show();
			}
		});
	});
});