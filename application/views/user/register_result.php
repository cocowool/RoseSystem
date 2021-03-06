<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>悦食中国</title>
	<meta name="keyword" content="悦食中国，悦食，美食，食物，生活顾问，重建人与食物的关系">
	<meta name="description" content="悦食中国（Yueshi China）是由殳俏女士发起的以食物为根基、多方向展开的生活顾问项目。通过悦食中国项目，连同众多线上和线下的市场宣传活动，重建人与食物的关系，引导大众关注并保护中国濒临绝迹的手工食物和传统食材，同时推广“悦食中国”项目通过公平、公正原则认可的高品质食材及加工食品。">
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
			<div class="col-md-10 col-xs-12">
				<div class='ys_top_title'>
					<h1><a href="javascript:void(0);">YUESHI CHINA</a></h1>
				</div>
				
      			
      			<div class="container row">
      				<h3>提示信息</h3>
      				<p><?php echo $status; ?></p>
      				<p><?php echo $errmsg; ?></p>
      			</div>
			</div>
			<div class="col-md-2 ys_sidebar">
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
	<script type="text/javascript" src="/libs/jquery-plugin/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="/templates/yueshi/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.ys_ajaxmore a').click(function(){
				$.ajax({
					'type'	:	'POST',
					'dataType'	:	'json',
					'url'	:	'/index/serverside',
					'data'	:	{
						'pagesize'	:	'3',
						'start'	:	$('.ys_latest>div').length
					},
					'beforeSend'	:	function(){
						$('.ys_ajaxmore').hide();
						$('.ys_loading').removeClass('hide');
					},
					'success'	:	function(result){
						$.each(result,function(k,v){
							$('.ys_latest').append('<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6"><div class="ys_thumbnail_block"><a href="'+v.f_link+'"><img src="'+v.f_img+'"></a><div class="ys_caption"><h4><a href="'+v.f_link+'">'+v.f_title+'</a></h4><p>'+v.f_desc+'</p></div></div></div>');
						});
						$('.ys_loading').hide();
						$('.ys_ajaxmore').show();
					}
				});	
			});
			
			var $container = $('#ys_top_article');
			$container.masonry({
			  columnWidth: 254,
			  itemSelector: '.col-md-4'
			});
		});
	</script>
</body>
</html>