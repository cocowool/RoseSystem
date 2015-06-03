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
	<link href="/libs/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet" media="screen">
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
				
				<div class="ys_container_register">
				<?php if(validation_errors() ){ ?>
				<div class="ys_tips_error">
					<?php echo validation_errors(); ?>
				</div>
				<?php } ?>
				<h2 class="ys_title_register">会员注册</h2>
				<form name="registerForm" id="registerForm" action="/user/register" method="post" class="">
				<div class="ys_form_section">
					<div class="form-group">
						<label class="ys_form_label" for="username">用户名称<b>*</b></label>
						<input type="text" class="form-control" name="username" id="username" placeholder="请输入用户名" value="<?php echo set_value('username'); ?>" />
					</div>
					<div class="form-group">
						<label for="password" class="ys_form_label">用户密码<b>*</b></label>
						<input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" />
						<span class="focus two-line hide">6-20位字符，可使用数字、字母和符号的组合</span>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="chkPassword">确认密码<b>*</b></label>
						<input type="password" class="form-control" name="chkPassword" id="chkPassword" value="<?php echo set_value('chkPassword'); ?>" />
						<span class="focus hide">请再次输入密码</span>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="lastname">姓<b>*</b></label>
						<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>" />
						<span class="focus hide">请输入姓氏</span>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="firstname">名<b>*</b></label>
						<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>" />
						<span class="focus hide">请输入您的名字</span>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="gender">性别<b>*</b></label>
						<input type="radio" name="gender" value="1" <?php echo set_radio('gender', '1', true); ?> />&nbsp;男&nbsp;
						<input type="radio" name="gender" value="0" <?php echo set_radio('gender', '0'); ?> />&nbsp;女
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="birthday">生日<b>*</b></label>
						<input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo set_value('birthday'); ?>" />
						<label class="focus hide">请选择您的出生日期</label>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="hometown">居住地<b>*</b></label><select id="hometown" name="hometown" class="form-control ys_form_select">
                            <option value="">请选择</option>
				            <option value="北京">北京</option>
				            <option value="上海">上海</option>
				            <option value="天津">天津</option>
				            <option value="重庆">重庆</option>
				            <option value="河北">河北</option>
				            <option value="山西">山西</option>
				            <option value="河南">河南</option>
				            <option value="辽宁">辽宁</option>
				            <option value="吉林">吉林</option>
				            <option value="黑龙江">黑龙江</option>
				            <option value="内蒙古">内蒙古</option>
				            <option value="江苏">江苏</option>
				            <option value="山东">山东</option>
				            <option value="安徽">安徽</option>
				            <option value="浙江">浙江</option>
				            <option value="福建">福建</option>
				            <option value="湖北">湖北</option>
				            <option value="湖南">湖南</option>
				            <option value="广东">广东</option>
				            <option value="广西">广西</option>
				            <option value="江西">江西</option>
				            <option value="四川">四川</option>
				            <option value="海南">海南</option>
				            <option value="贵州">贵州</option>
				            <option value="云南">云南</option>
				            <option value="西藏">西藏</option>
				            <option value="陕西">陕西</option>
				            <option value="甘肃">甘肃</option>
				            <option value="青海">青海</option>
				            <option value="宁夏">宁夏</option>
				            <option value="新疆">新疆</option>
				            <option value="台湾">台湾</option>
				            <option value="香港">香港</option>
				            <option value="澳门">澳门</option>
				            <option value="海外">海外</option>
			            </select>
						<span class="focus hide">请选择居住地</span>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="email">电子邮箱<b>*</b></label>
						<input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" />
						<span class="focus hide">请输入合法的电子邮箱地址</span>
					</div>
					<div class="form-group">
						<div class="register-policy">
							<p>
								<input type="checkbox" checked /> 我希望订阅 [ 悦食中国 ] 的电子刊物。
							</p>
							<p>
								<input type="checkbox" checked /> 我同意 [ <a href="/article/detail/12">用户服务条款</a> ]。
							</p>								
						</div>
					</div>
				</div>
				<div class="ys_form_section">
					<div class="form-group">
						<label class="ys_form_label" for="address">邮寄地址<b>*</b></label>
						<input type="text" class="form-control" name="address" id="address" value="<?php echo set_value('address'); ?>" />
						<span class="focus hide">请输入邮寄地址</span>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="mobile">手机号码<b>*</b></label>
						<input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" />
						<span class="focus hide">请输入手机号码</span>
						<span class="feedback hide"></span>
					</div>
					<div class="form-group">
						<label class="ys_form_label" for="chkMobile">验证码<b>*</b></label>
							<input type="text" class="form-control" name="chkMobile" id="chkMobile" />
							<img src="http://www.yueshichina.com/register/captcha" />
					</div>
				</div>
				<div class="ys_form_section ys_questionnaire">
					<div class="form-group">
						<p>&copy;您经常在家吃饭吗?</p>
						<p>
							<input type="radio" name="eathome" value="1" <?php echo set_radio('eathome', '1', true); ?> />&nbsp;每周五次以上&nbsp;&nbsp;&nbsp;
							<input type="radio" name="eathome" value="2" <?php echo set_radio('eathome', '2'); ?> />&nbsp;每周至少一次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="eathome" value="3" <?php echo set_radio('eathome', '3'); ?> />&nbsp;极偶尔
						</p>						
					</div>
					<div class="form-group">
						<p>&copy;您喜爱烹饪吗?</p>
						<p>
							<input type="radio" name="cooklover" value="1" <?php echo set_radio('cooklover', '1', true); ?> />&nbsp;热爱且擅长&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cooklover" value="2" <?php echo set_radio('cooklover', '2'); ?> />&nbsp;感兴趣但不擅长&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cooklover" value="3" <?php echo set_radio('cooklover', '3'); ?> />&nbsp;不太感兴趣
						</p>						
					</div>
					<div class="form-group">
						<p>&copy;您经常烹饪吗?</p>
						<p>
							<input type="radio" name="cookoften" value="1"  <?php echo set_radio('cookoften', '1', true); ?> />&nbsp;每天&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cookoften" value="2"  <?php echo set_radio('cookoften', '2'); ?> />&nbsp;每周至少一次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cookoften" value="3"  <?php echo set_radio('cookoften', '3'); ?> />&nbsp;偶尔&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cookoften" value="4"  <?php echo set_radio('cookoften', '4'); ?> />&nbsp;从不&nbsp;&nbsp;&nbsp;
						</p>						
					</div>
					<div class="form-group">
						<p>&copy;您经常出国旅行吗?</p>
						<p>
							<input type="radio" name="travel" value="1" <?php echo set_radio('travel', '1', TRUE); ?> />&nbsp;每年多次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="travel" value="2" <?php echo set_radio('travel', '2'); ?> />&nbsp;每年至少一次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="travel" value="3" <?php echo set_radio('travel', '3'); ?> />&nbsp;偶尔&nbsp;&nbsp;&nbsp;
							<input type="radio" name="travel" value="4" <?php echo set_radio('travel', '4'); ?> />&nbsp;没有&nbsp;&nbsp;&nbsp;
						</p>						
					</div>
				</div>
				<div class="form-group ys_register_btn">
					<a href="javascript:void(0);" class="btn btn-danger register-button">注册</a>&nbsp;&nbsp;
					<a href="/user/login">已有帐号，登陆</a>&nbsp;&nbsp;<a class="hide" href="#">忘记密码？</a>
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
	<script type="text/javascript" src="/libs/jquery-ui-1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/libs/bootstrap-3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/templates/yueshi/js/main.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#birthday').datepicker({
			'dateFormat' : 'yy-mm-dd',
			'changeMonth' : true,
			'changeYear' : true,
			'yearRange' : '1900:2013'
		});

		$('.form-group input').focus(function(){
			$(this).next().removeClass('hide').show();
		}).blur(function(){
			$(this).next().hide();
		});	

		function check_mobile(){
			if( $('#mobile').val() == '' ){
				$('#mobile').next().next().html( $('#mobile').next().html() ).removeClass('hide').show();
				return false;
			}

			if(!$("#mobile").val().match(/^1[3|4|5|8][0-9]\d{8}$/)){
				$('#mobile').next().next().html('手机号格式不正确').removeClass('hide').show();
				return false;
			}

			return true;
		}

		function check_email( email ){
			var patten = new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
			return patten.test(email);
		}
		
		$('.register-button').click(function(){
			if( !check_mobile() ){
				$('#mobile').focus().parent().addClass('has-error');
				return false;
			}
			if( !check_email( $('#email').val() ) ){
				$('#email').focus();
				return false;
			}
			
			$('#registerForm').submit();
		});
	});
	</script>
</body>
</html>