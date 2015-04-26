<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title></title>
	<meta name="keyword" content="">
	<meta name="description" content="">
	<link rel="icon" href="/favicon.ico">
	<link href="/libs/bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/libs/bootstrap-3.3.4/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<link href="/templates/yueshi/css/main.css" rel="stylesheet" media="screen">
	<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar ys_header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 ys_search">
					<p><input type='text' name='ys_site_search' id='ys_site_search' /><a href="#">搜索</a></p>
				</div>
				<div class="col-md-8">
					<p>
						<a href="/user/register">注册</a>
						<input type='text' name='ys_username' id='ys_username' />
						<input type='text' name='ys_password' id='ys_password' />
						<a href="javascript:void(0);">登录</a>
						<a href="javascript:void(0);">忘记密码</a>
					</p>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class='ys_top_title'>
					<h1><a href="javascript:void(0);">悦食中国</a></h1>
				</div>
				
      			<div class="ys_container_register">
					<form name="loginForm" id="loginForm" action="/register/login" method="post">
					<?php if(validation_errors() ){ ?>
					<div class="ys_tips_error">
						<?php echo validation_errors(); ?>
					</div>
					<?php } ?>
					<h2 class="ys_title_register">会员登陆</h2>
					<div class="ys_form_section">
						<div class="form-group">
							<label class="ys_form_label" for="username">用户名称<b>*</b></label>
							<input type="text" class="form-control" name="username" id="username" placeholder="请输入用户名" value="<?php echo set_value('username'); ?>" />
						</div>
						<div class="form-group">
							<label for="password" class="ys_form_label">用户密码<b>*</b></label>
							<input type="password" class="form-control" name="password" id="password" placeholder="请输入密码" value="<?php echo set_value('password'); ?>" />
							<span class="focus two-line hide">6-20位字符，可使用数字、字母和符号的组合</span>
						</div>
						<input type="hidden" name="eventid" id="eventid" value="<?php echo $eventid; ?>" />
						<div class="form-group">
							<a href="#" class="btn btn-danger login-button">登陆</a>&nbsp;&nbsp;
							<a href="/user/register">没有帐号？马上注册</a>
						</div>
					</div>
					</form>
				</div>
      			
			</div>
			<div class="col-md-2">
				<div class="ys_logo">
					<h2><a href="javascript:void(0);">悦食中国</a></h2>
					<div class="ys_date">
						<p><?php echo date('Y', time()); ?></p>
						<p><?php echo date('m', time()); ?></p>
						<p><?php echo date('d', time()); ?></p>
					</div>
				</div>
				<div id="YS_MENU" class="ys_tie_<?php echo $tie; ?>">
					<?php $this->load->view('common/menu'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('common/footer'); ?>
	
	<script type="text/javascript" src="/static/lib/jquery1.9.1/jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
		$(window).ready(function(){
			$('.main-menu-item').hover(function(){
				$(this).addClass('sub-menu-on');
				$(this).children('.main-menu-text').next().show();
			}, function(){
				$(this).removeClass('sub-menu-on');
				$(this).children('.main-menu-text').next().hide();
			});

			$('.input-item input').focus(function(){
				$(this).next().show();
			}).blur(function(){
				$(this).next().hide();
			});		

			$('#username').keypress(function(){
				$('#username').next().next().hide();
			});
			$('#password').keypress(function(){
				$('#password').next().next().hide();
			});

			$('.login-button').click(function(){
				if(  ! $('#username').val() ){					
					$('#username').next().next().html('用户名称不能为空').show();
					return false;
				}
				if(  ! $('#password').val() ){					
					$('#password').next().next().html('用户密码不能为空').show();
					return false;
				}
				$('#loginForm').submit();
			});
		});
	</script>
</body>
</html>