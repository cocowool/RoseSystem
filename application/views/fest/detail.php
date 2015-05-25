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
					<h1><a href="javascript:void(0);" name="top">悦食中国</a></h1>
				</div>
				
				<div class="ys_breadcrum">
					<p>
						<?php //echo $breadcrum; ?>
					</p>
				</div>
      			
      			<div class="ys_fest_container">
      				
      				<div class="ys_fest_logo">
      					<p><a href="/fest"></a><img src="/templates/yueshi/images/festlogo.png" /></a></p>
      				</div>
      				
      				<?php 
      				if(empty($fest_list)){
						echo "<div><p>暂时没有内容。</p></div>";
					}else{
      				?>
      				<div class="ys_fest_nav">
      					<ul class="ys_menu_nav">
      					<?php 
      					$style = '';
      					foreach ($fest_list as $k=>$v){
							if($k==0) $style = 'active';
      						echo '<li><a href="/fest/'.$v['f_year'].'" class="'.$style.'">'.$v['f_year'].'</a></li>';
						}
      					?>
      					</ul>
      				</div>
      				<div class="ys_fest_desc">
      					<?php 
      						if(!empty($f_desc)){
								echo $f_desc;
							}
      					?>
      				</div>
      				<div class="ys_fest_forum">
      					<?php 
      					if(!empty($forum_list)){
							$forum_html = '';
							$forum_html .= '<h4 class="ys_column_title">悦食论坛</h4>';
							$forum_html .= '<div class="row ys_forum_speaker_container"><div class="col-md-4 col-sm-0 col-xs-0">';
							foreach ($forum_list as $k=>$v){
								$style = '';
								if($k==0) $style = 'active';
		
								$forum_html .= '<div class="media '.$style.'">';
								$forum_html .= 	'<div class="media-left">';
								$forum_html .= 	'<a href="javascript:void(0);"><img class="media-object" src="'.$v['f_thumb'].'"/></a>';
								$forum_html .= 	'</div>';
								$forum_html .= 	'<div class="media-body">';
								$forum_html .= 	'<h4 class="media-heading">'.$v['id'].'</h4><p>'.mb_substr($v['f_title'],0,12,'utf-8').'</p>';
								$forum_html .= 	'</div>';
								$forum_html .= '</div>';
							}
							$forum_html .= '</div>';
							$forum_html .= '<div class="col-md-8 col-sm-12 col-xs-12">';
							foreach ($forum_list as $k=>$v){
								$style = '';
								if($k==0) $style = 'active';
								$forum_html .= '<div class="ys_forum_item '.$style.'">';
								if($v['f_type'] == 1){
									$url = '/article/detail/' . $v['aid'];
								}else{
									$url = '/video/detail/' . $v['aid'];
								}
								$forum_html .= '<a href="'.$url.'"><img src="'.$v['f_thumb'].'" /></a></div>';
							}
							$forum_html .= '</div></div>';
							
			
							echo $forum_html;
						}
      					?>
      					<div class="ys_go_top">
      						<p><a href="#top">回到顶部</a></p>
      					</div>
      				</div>
      				<div class="ys_fest_carnival">
      					<h4 class="ys_column_title">悦食市集嘉年华</h4>
      					<div class="ys_carnival">
							<ul class="ys_menu_nav">
      							<li><a href="javascipt:void(0);" class="active">农夫实验室</a></li>
      							<li><a href="javascipt:void(0);">味觉会馆</a></li>
      							<li><a href="javascipt:void(0);">流动厨艺学校</a></li>
      							<li><a href="javascipt:void(0);">悦食影像展</a></li>
      						</ul>
      					</div>
      					<div class="ys_carnival_list">
      						<div id="ys-carnival-focus" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								</ol>
								
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="/temp/c1.jpg" alt="">
										<div class="carousel-caption">
								        XXX
										</div>
									</div>
									<div class="item">
										<img src="/temp/c2.jpg" alt="">
										<div class="carousel-caption">
								        YYY
										</div>
									</div>
								</div>
								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
      					</div>
      					<div class="ys_go_top">
      						<p><a href="#top">回到顶部</a></p>
      					</div>
      				</div>
      				<div class="ys_fest_consultant">
      					<h4 class="ys_column_title">悦食顾问</h4>
      					<div class="ys_consultant_list row">
      						<div class="col-xs-3 col-md-1 col-sm-4">
      							<a href="javascript:void(0);" class="thumbnail" data-toggle="tooltip" title="侯晓文" data-placement="top"><img src="/temp/H1.jpg" /></a>
      						</div>
      					</div>
      					<div class="ys_consultant_detail">
      						<div class="row ys_consultant_desc">
      							<div class="col-md-2 col-xs-1"></div>
      							<div class="col-md-8 col-xs-10 row">
      								<div class="col-md-4">
      									<a href="javascript:void(0);" class="thumbnail"><img src="/temp/H4.jpg" /></a>
      								</div>
      								<div class="col-md-6 ys_consultant_resume_container">
      									<h4>侯晓文</h4>
      									<div class="ys_consultant_resume">
      										<p>1954.1.1</p>
      										<p>巨蟹座</p>
      										<p>北京市XXX协会</p>
      										<p></p>
      										<p></p>
      									</div>
      								</div>
      							</div>
      							<div class="col-md-2 col-xs-1"></div>
      						</div>
      						<div class="row ys_consultant_words">
      							<p>另外，我们要抱团推西部区域，抱团的发轫是从秦皇半岛开始的，我看到现在北部的万科、恒大、兴龙都在抱团，下面还要把玉带湾加进来，这是一个好现象，从板块整体来说，大家都是为了一个更好的目的，都是为了更好的销售，只是各个板块之间有不同的优势和缺点。有一些因素是先天的，我们没有办法过多的评价，但对于具体的项目，我们有更多的战术要去弥补和改进。对于板块整体向外推广，前些年一些媒体或者一些项目也在做，但是结果不是特别好，中间有一个关键问题，之所以大连、威海这些城市能够做的好，我觉得要上升到城市意识，它们有政府在做依靠，但是秦皇岛在这方面会弱一些，之前我到北京的房展会去看，秦皇岛还是比较松散的。举个例子，今天上午我路过南戴河的时候，看到交通指示牌下写着“抚宁县南戴河”，实际上这是地方权利分割的问题，一些区域在地方管辖上还没有太理顺，这是一个政府的力度的问题。</p>
      						</div>
      					</div>
      					<div class="ys_go_top">
      						<p><a href="#top">回到顶部</a></p>
      					</div>
      				</div>
      				<?php } ?>
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
	$(document).ready(function(){
		$('.carousel').carousel();
		$('[data-toggle="tooltip"]').tooltip();

		$('.media').click(function(){
			$('.ys_forum_item').hide().eq($(this).index()).removeClass('hide').show();
		});
	});
	</script>
</body>
</html>