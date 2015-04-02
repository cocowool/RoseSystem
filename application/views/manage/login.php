<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title></title>
	<link href="/libs/bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/libs/bootstrap-3.3.4/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<link href="/templates/manage/css/main.css" rel="stylesheet" media="screen">
</head>
<body>
	<nav class="navbar navbar-inverse">
	
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="rs_container_login">
				<form id='login' name='login' method='post' action='/manage/auth'>
					<p><h3>后台登录</h3></p>
					<p><label for="username">账号：</label><input type="text" class="form-control" placeholder='请输入用户名' name="username" id="username" /></p>
					<p><label for="password">密码：</label><input type="password" class="form-control" placeholder='请输入密码' name="password" id="password" /></p>
					<p><input type='submit' id='submit' name='submit' value='登录' class="form-control btn btn-primary" /></p>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
