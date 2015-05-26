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
	<?php $this->load->view('common/header')?>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class='ys_top_title'>
					<h1><a href="javascript:void(0);">悦食中国</a></h1>
				</div>
				
      			<div class="ys_container_register">
					<form name="loginForm" id="loginForm" action="/user/login" method="post">
					<?php if(validation_errors() ){ ?>
					<div class="ys_tips_error">
						<?php echo validation_errors(); ?>
					</div>
					<?php } ?>
					<h2 class="ys_title_register">找回密码</h2>
					<div class="ys_form_section">
						<div class="form-group">
							<label class="ys_form_label" for="username">用户名称<b>*</b></label>
							<input type="text" class="form-control" name="username" id="username" placeholder="请输入用户名" value="<?php echo set_value('username'); ?>" />
							<span></span>
							<span></span>
						</div>
						<div class="form-group">
							<label for="email" class="ys_form_label">邮箱<b>*</b></label>
							<input type="tet" class="form-control" name="email" id="email" placeholder="请输入邮箱" value="<?php echo set_value('password'); ?>" />
							<span class="focus two-line hide">6-20位字符，可使用数字、字母和符号的组合</span>
							<span></span>
						</div>
						<div class="form-group">
							<a href="javascript:void(0);" class="btn btn-primary login-button">提交</a>&nbsp;&nbsp;
							<a href="/user/login">登录</a>
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
	
	<script type="text/javascript" src="/libs/jquery/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/libs/bootstrap-3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/templates/yueshi/js/main.js"></script>
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

			$('.ys_form_section #username').keypress(function(){
				$('.ys_form_section #username').next().next().hide();
			});
			$('.ys_form_section #password').keypress(function(){
				$('.ys_form_section #password').next().next().hide();
			});

			$('.login-button').click(function(){
				if(  ! $('.ys_form_section #username').val() ){					
					$('.ys_form_section #username').next().next().html('用户名称不能为空').show();
					return false;
				}
				if(  ! $('.ys_form_section #password').val() ){					
					$('.ys_form_section #password').next().next().html('用户密码不能为空').show();
				}
				console.log('test');
				$('#loginForm').submit();
			});
		});
	</script>
</body>
</html>