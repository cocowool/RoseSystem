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
	<?php $this->load->view('common/header'); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class='ys_top_title'>
					<h1>悦食中国</h1>
				</div>
				
      			<div class="ys_container">
					<div class="ys_menu_breadcrum">
						
					</div>      			
      			</div>
      			
      			<div class="ys_container_register">
					<form name="editForm" id="editForm" action="/user/detail" method="post" enctype="multipart/form-data">
					<?php if(validation_errors() ){ ?>
					<div class="ys_tips_error">
						<?php echo validation_errors(); ?>
					</div>
					<?php } ?>
					<h2 class="ys_title_register">会员信息</h2>
					<div class="ys_form_section">
						<input type='hidden' name='id' value='<?php echo $userinfo['id']; ?>' />
						<div class="form-group">
							<label class="ys_form_label" for="username">用户名称<b>*</b></label>
							<input type="text" class="form-control" name="username" id="username" placeholder="请输入用户名" value="<?php echo set_value('username', $userinfo['username']); ?>" />
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="lastname">姓<b>*</b></label>
							<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo set_value('lastname', $userinfo['lastname']); ?>" />
							<span class="focus hide">请输入姓氏</span>
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="firstname">名<b>*</b></label>
							<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo set_value('firstname', $userinfo['firstname']); ?>" />
							<span class="focus hide">请输入您的名字</span>
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="firstname">头像<b>*</b></label>
							<input type="file" name="usericon" id="usericon" />
							<span class="focus hide"></span>
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="gender">性别<b>*</b></label>
							<input type="radio" name="gender" value="1" <?php echo set_radio('gender', '1', ($userinfo['gender']==1)?true:false); ?> />&nbsp;男&nbsp;
							<input type="radio" name="gender" value="0" <?php echo set_radio('gender', '0', ($userinfo['gender']==0)?true:false); ?> />&nbsp;女
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="birthday">生日<b>*</b></label>
							<input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo set_value('birthday', $userinfo['birthday']); ?>" />
							<label class="focus hide">请选择您的出生日期</label>
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="hometown">居住地<b>*</b></label>
							<?php 
								echo form_dropdown('hometown', $this->config->item('city'), $userinfo['hometown'], 'class="form-control ys_form_select"');
							?>
							<label class="focus hide">请选择居住地</label>
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="email">电子邮箱<b>*</b></label>
							<input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email', $userinfo['email']); ?>" />
							<label class="focus hide">请输入合法的电子邮箱地址</label>
						</div>
					</div>
					<div class="ys_form_section">
						<div class="form-group">
							<label class="ys_form_label" for="address">邮寄地址<b>*</b></label>
							<input type="text" class="form-control" name="address" id="address" value="<?php echo set_value('address', $userinfo['address']); ?>" />
							<label class="focus hide">请输入邮寄地址</label>
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="mobile">手机号码<b>*</b></label>
							<input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo set_value('mobile', $userinfo['mobile']); ?>" />
							<label class="focus hide">请输入手机号码</label>
							<label class="feedback hide"></label>
						</div>
						<div class="form-group">
							<label class="ys_form_label" for="chkMobile">验证码<b>*</b></label>
								<input type="text" class="form-control" name="chkMobile" id="chkMobile" />
								<img src="http://www.yueshichina.com/register/captcha" />
						</div>
					</div>
					<div class="form-group">
						<a href="javascript:void(0);" class="btn btn-primary ys_btn_edit_user">保存</a>&nbsp;&nbsp;
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
</body>
</html>