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
				<div id="carousel-example-generic" class="carousel slide ys_homefocus" data-ride="carousel">
			        <ol class="carousel-indicators">
         	 			<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
				        <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
				        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
			        </ol>
			        <div class="carousel-inner" role="listbox">
          				<div class="item">
            				<img data-src="" alt="First slide [1140x500]" src="/temp/f1.png" data-holder-rendered="false">
          				</div>
          				<div class="item active">
            				<img data-src="" alt="Second slide [1140x500]" src="/temp/f2.png" data-holder-rendered="false">
          				</div>
	          			<div class="item">
            				<img data-src="" alt="Third slide [1140x500]" src="/temp/f3.png" data-holder-rendered="false">
          				</div>
        			</div>
        			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          				<span class="sr-only">Previous</span>
        			</a>
        			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          				<span class="sr-only">Next</span>
        			</a>
      			</div>
      			
      			<div class="ys_container">
					<div class="row">
						<div class="col-md-4">
							<div class="ys_thumbnail_block">
								<a href="javascript:void(0);">
									<img src="/temp/tb1.png" />
								</a>
								<div class="ys_caption">
									<h3><a href="javascript:void(0);">匠心独运</a></h3>
									<p>这里地处维多利亚交通枢纽附近，人们每天从近郊的家坐火车到这里，换乘地铁去上班，所以街道上永远都充斥着西装革履端着咖啡的上班族，目不斜视大步流星地掠过，还有背着大包小包的游客，握着地图四处张望着。</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ys_thumbnail_block">
								<a href="javascript:void(0);">
									<img src="/temp/tb2.png" />
								</a>
								<div class="ys_caption">
									<h3><a href="javascript:void(0);">匠心独运</a></h3>
									<p>这里地处维多利亚交通枢纽附近，人们每天从近郊的家坐火车到这里，换乘地铁去上班，所以街道上永远都充斥着西装革履端着咖啡的上班族，目不斜视大步流星地掠过，还有背着大包小包的游客，握着地图四处张望着。</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="ys_thumbnail_block">
								<a href="javascript:void(0);">
									<img src="/temp/tb3.png" />
								</a>
								<div class="ys_caption">
									<h3><a href="javascript:void(0);">匠心独运</a></h3>
									<p>这里地处维多利亚交通枢纽附近，人们每天从近郊的家坐火车到这里，换乘地铁去上班，所以街道上永远都充斥着西装革履端着咖啡的上班族，目不斜视大步流星地掠过，还有背着大包小包的游客，握着地图四处张望着。</p>
								</div>
							</div>
						</div>
					</div>
			      	<div class="row">
			      		<div class="ys_ajaxmore">
			      			<p><a href="javascript:void(0);">点击加载更多精彩内容 </a></p>
			      		</div>
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