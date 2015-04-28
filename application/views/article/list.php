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
				<div class="ys_container">
					<div class="row">
						<div class="col-md-12">
							<ul class="ys_menu_nav">
								<li><a href='javascript:void(0);' class="active">专题故事</a></li>
								<li><a href='javascript:void(0);'>封面人物</a></li>
								<li><a href='javascript:void(0);'>寻味</a></li>
								<li><a href='javascript:void(0);'>专栏</a></li>
							</ul>
						</div>
					</div>
				</div>
      			
      			<div class="ys_container">
					<div class="row ys_latest">
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
									<img src="/temp/tb2.png" />
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