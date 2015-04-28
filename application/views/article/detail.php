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
				
				<div class="ys_breadcrum">
					<p>
						<?php echo $breadcrum; ?>
					</p>
				</div>
      			
      			<div class="ys_article">
      				<h1><?php echo $name; ?></h1>
      				<h2><?php echo $subtitle; ?></h2>
					<p class="ys_article_author">
						<?php 
						if( !empty($author) && !empty($photographer) ){
							if( $author == $photographer ){
								$prefix = '文/图&copy;' . $author;
							}else{
								$prefix = '文&copy;' . $author . ' 图&copy;' . $photographer . ' ' . $others;
							}
						}else{
							if( !empty($author) ){
								$prefix = '文&copy;' . $author;
							}
							
							if( !empty($photographer) ){
								$prefix .= ' 图&copy;' . $photographer;
							}
	
							$prefix .= ' ' . $others;
						}
						
						echo $prefix;
						?>
					</p>
      				<div class="ys_article_content">
      					<?php echo $content; ?>
      				</div>
      				<div class="ys_article_stat">
      					<p>
      						<span>阅读：</span>2888&nbsp;&nbsp;
      						<button type="button" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 喜欢
							</button>
      						<button type="button" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏
							</button>
      					</p>
      				</div>
      				<div class="share-links">
						<!-- JiaThis Button BEGIN -->
						<div class="jiathis_style">
						<a class="jiathis_button_tsina"></a>
						<a class="jiathis_button_weixin"></a>
						<a class="jiathis_button_email"></a>
						<a class="jiathis_button_douban"></a>
						<a href="http://www.jiathis.com/share?uid=905086" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
						<a class="jiathis_counter_style"></a>
						</div>
						<script type="text/javascript" >
						var jiathis_config={
							data_track_clickback:true,
							summary:"",
							hideMore:false
						}
						</script>
						<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=905086" charset="utf-8"></script>
						<!-- JiaThis Button END -->						
					</div>
      				<div class="ys_article_comment">
      				
      					<div class="ys_comment_list">
      						
      					</div>
      				</div>
      				<div class="ys_article_related">
      					<h3>相关文章</h3>
      				</div>
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