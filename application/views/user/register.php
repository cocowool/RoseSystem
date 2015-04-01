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
						<a href="javascript:void(0);">注册</a>
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
				<form name="registerForm" id="registerForm" action="/user/register" method="post">
				<?php if(validation_errors() ){ ?>
				<div class="register-errors">
					<?php echo validation_errors(); ?>
				</div>
				<?php } ?>
				<h2 class="register-title">会员注册</h2>
				<div class="register-section">
					<div class="register-item">
						<span class="block-left register-label">用户名称<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="text" name="username" id="username" placeholder="请输入用户名" value="<?php echo set_value('username'); ?>" />
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">用户密码<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" />
								<label class="focus two-line hide">6-20位字符，可使用数字、字母和符号的组合</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">确认密码<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="password" name="chkPassword" id="chkPassword" value="<?php echo set_value('chkPassword'); ?>" />
								<label class="focus hide">请再次输入密码</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">姓<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="text" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>" />
								<label class="focus hide">请输入姓氏</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">名<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="text" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>" />
								<label class="focus hide">请输入您的名字</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">性别<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-gender">
								<input type="radio" name="gender" value="1" <?php echo set_radio('gender', '1', true); ?> />&nbsp;男&nbsp;
								<input type="radio" name="gender" value="0" <?php echo set_radio('gender', '0'); ?> />&nbsp;女
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">生日<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="text" name="birthday" id="birthday" value="<?php echo set_value('birthday'); ?>" />
								<label class="focus hide">请选择您的出生日期</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">居住地<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<select id="hometown" name="hometown" class="form-select">
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
								<label class="focus hide">请选择居住地</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">电子邮箱<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" />
								<label class="focus hide">请输入合法的电子邮箱地址</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label"></span>
						<div class="block-right register-content">
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
				</div>
				<div class="register-section">
					<div class="register-item">
						<span class="block-left register-label">邮寄地址<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="text" name="address" id="address" value="<?php echo set_value('address'); ?>" />
								<label class="focus hide">请输入邮寄地址</label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">手机号码<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
								<input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" />
								<label class="focus hide">请输入手机号码</label>
								<label class="feedback hide"></label>
							</div>
						</div>
					</div>
					<div class="register-item">
						<span class="block-left register-label">验证码<b>*</b></span>
						<div class="block-right register-content input-item">
							<div class="userinput register-chkmobile">
								<input type="text" name="chkMobile" id="chkMobile" />
								<b></b>
								<img src="http://www.yueshichina.com/register/captcha" />
							</div>
						</div>
					</div>
				</div>
				<div class="register-section">
					<div class="register-item">
						<span class="block-left register-label">&copy;您经常在家吃饭吗?</span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
							</div>
						</div>
						<div class="hackbox"></div>
					</div>
					<div class="question-option">
						<p>
							<input type="radio" name="eathome" value="1" <?php echo set_radio('eathome', '1', true); ?> />&nbsp;每周五次以上&nbsp;&nbsp;&nbsp;
							<input type="radio" name="eathome" value="2" <?php echo set_radio('eathome', '2'); ?> />&nbsp;每周至少一次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="eathome" value="3" <?php echo set_radio('eathome', '3'); ?> />&nbsp;极偶尔
						</p>						
					</div>
					<div class="hackbox"></div>
					<div class="register-item">
						<span class="block-left register-label">&copy;您喜爱烹饪吗?</span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
							</div>
						</div>
						<div class="hackbox"></div>
					</div>
					<div class="question-option">
						<p>
							<input type="radio" name="cooklover" value="1" <?php echo set_radio('cooklover', '1', true); ?> />&nbsp;热爱且擅长&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cooklover" value="2" <?php echo set_radio('cooklover', '2'); ?> />&nbsp;感兴趣但不擅长&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cooklover" value="3" <?php echo set_radio('cooklover', '3'); ?> />&nbsp;不太感兴趣
						</p>						
					</div>
					<div class="hackbox"></div>
					<div class="register-item">
						<span class="block-left register-label">&copy;您经常烹饪吗?</span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
							</div>
						</div>
						<div class="hackbox"></div>
					</div>
					<div class="question-option">
						<p>
							<input type="radio" name="cookoften" value="1"  <?php echo set_radio('cookoften', '1', true); ?> />&nbsp;每天&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cookoften" value="2"  <?php echo set_radio('cookoften', '2'); ?> />&nbsp;每周至少一次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cookoften" value="3"  <?php echo set_radio('cookoften', '3'); ?> />&nbsp;偶尔&nbsp;&nbsp;&nbsp;
							<input type="radio" name="cookoften" value="4"  <?php echo set_radio('cookoften', '4'); ?> />&nbsp;从不&nbsp;&nbsp;&nbsp;
						</p>						
					</div>
					<div class="hackbox"></div>
					<div class="register-item">
						<span class="block-left register-label">&copy;您经常出国旅行吗?</span>
						<div class="block-right register-content input-item">
							<div class="user-input register-username">
							</div>
						</div>
						<div class="hackbox"></div>
					</div>
					<div class="question-option">
						<p>
							<input type="radio" name="travel" value="1" <?php echo set_radio('travel', '1', TRUE); ?> />&nbsp;每年多次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="travel" value="2" <?php echo set_radio('travel', '2'); ?> />&nbsp;每年至少一次&nbsp;&nbsp;&nbsp;
							<input type="radio" name="travel" value="3" <?php echo set_radio('travel', '3'); ?> />&nbsp;偶尔&nbsp;&nbsp;&nbsp;
							<input type="radio" name="travel" value="4" <?php echo set_radio('travel', '4'); ?> />&nbsp;没有&nbsp;&nbsp;&nbsp;
						</p>						
					</div>
					<div class="hackbox"></div>
				</div>
				<div class="register-section">
					<div class="register-item">
						<span class="block-left register-label">
							<a href="#" class="register-button">注册</a>
						</span>
						<div class="block-right register-content input-item register-login-tip">
							<p>* 已有帐号，<a href="/register/login">登陆</a>&nbsp;&nbsp;<a class="hide" href="#">忘记密码？</a></p>
						</div>
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
					<div class="ys_menu_container">
						<ul class="ys_menu">
							<li class="ys_menu_item"><a class="ys_menu_text m1" href="/" title="首页" alt="首页">首页</a></li>
							<li class="ys_menu_item">
								<a class="ys_menu_text m2" href="/article/5" title="风物" alt="风物">风物</a>
								<div class="ys_submenu_container hide">
									<ul class="ys_submenu">
										<li class="sub-menu-item"><a class="ys_submenu_text m21" href="/article/10">悦闻</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m22" href="/article/11">节气</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m23" href="/article/14">食材</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m24" href="/article/12">食谱</a></li>
									</ul>
								</div>
							</li>
							<li class="ys_menu_item">
								<a class="ys_menu_text m3" href="/article/6">知味</a>
								<div class="ys_submenu_container hide">
									<ul class="ys_submenu">
										<li class="sub-menu-item"><a class="ys_submenu_text m31" href="/article/13">食客</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m32" href="/article/15">职人</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m33" href="/article/22">器物</a></li>
									</ul>
								</div>
							</li>
							<li class="ys_menu_item">
								<a class="ys_menu_text m4" href="/article/7">食游记</a>
								<div class="ys_submenu_container hide">
									<ul class="ys_submenu">
										<li class="sub-menu-item"><a class="ys_submenu_text m41" href="/article/16">街区</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m42" href="/article/23">野餐</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m43" href="/article/17">自驾</a></li>
										<li class="sub-menu-item"><a class="ys_submenu_text m44" href="/article/18">酒店</a></li>
									</ul>
								</div>
							</li>
							<li class="ys_menu_item">
								<a class="ys_menu_text m5" href="/store">悦食家</a>
							</li>
							<!-- <li class="ys_menu_item"><a class="ys_menu_text m6" href="/club">悦食会</a></li> -->
							<li class="ys_menu_item"><a class="ys_menu_text m11" href="/fest">悦食大会</a></li>
							<li class="ys_menu_item"><a class="ys_menu_text m7" href="/article/detail/19">关于</a></li>
							<li>&nbsp;</li>
							<li class="ys_menu_item hide"><a class="ys_menu_text m8" href="/register">注册登录</a></li>
							<li class="ys_menu_item hide"><a class="ys_menu_text m9" href="/events">会员活动</a></li>
							<li class="ys_menu_item hide"><a class="ys_menu_text m10" href="http://www.amazon.cn/%E4%B8%89%E8%81%94%E7%94%9F%E6%B4%BB%E5%91%A8%E5%88%8A-%E6%9C%B1%E4%BC%9F/dp/B00DM1SOT8/ref=sr_1_1?s=books&amp;ie=UTF8&amp;qid=1372409051&amp;sr=1-1&amp;keywords=%E4%B8%89%E8%81%94+%E6%82%A6%E9%A3%9F#" target="_blank">购买杂志</a></li>
						</ul>
						<div class="yushi-barcode">
							<img width="120" height="120" src="/templates/yueshi/images/barcode.jpg">
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container ys_footer">
		<div class="row">
			<div class="col-md-5">
				CopyRight&copy;2015 Vita Group(China). All Rights Reserved.
			</div>
			<div class="col-md-7">
				<ul class="ys_foot_links">
					<li><a href="/article/detail/18">©官方微信</a></li>
					<li><a href="http://e.weibo.com/yszg2012/profile">©官方微博</a></li>
					<li><a href="/article/detail/48">©联系我们</a></li>
					<li><a href="/article/detail/12">©用户服务条款</a></li>
					<li><a href="/article/detail/11">©隐私权声明</a></li>
					<li><a href="/register">注册登录</a></li>
					<li><a href="/events">会员活动</a></li>
				</ul>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/libs/jquery/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/libs/bootstrap-3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/templates/yueshi/js/main.js"></script>
</body>
</html>