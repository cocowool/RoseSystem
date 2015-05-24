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
					<h1><a href="javascript:void(0);">悦食中国</a></h1>
				</div>
				
				<div class="ys_breadcrum">
					<p>
						<ol class="breadcrumb">
							<li><a href="/">首页</a></li>
							<li><a href="/chef">厨艺学校</a></li>
						</ol>
					</p>
				</div>
				
				<div class="ys_chef_nav">
					<div class="ys_chef_top">
						<img src="<?php echo $current_chef['s_thumb']; ?>" />
					</div>
					<div class="ys_chef_links">
						<div class="ys_chef_links_bg"></div>
						<div class="ys_chef_links_list">
							<ul>
							<?php
							$html_chef_list = ''; 
							foreach ($chef_list as $k=>$v ){
								$html_chef_list .= '<li>';
								$html_chef_list .= '<a href="/chef/'.$v['id'].'">'.$v['s_title'].'</a>';
								$html_chef_list .= '</li>';
							}
							echo $html_chef_list;
							?>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="ys_chef_content">
					<div class="ys_chef_desc">
						<?php echo $current_chef['s_desc']; ?>
					</div>
					<div class="ys_chef_menu row">
						<div class="col-md-6">
							<div class="ys_video_player embed-responsive embed-responsive-16by9">
			      				<iframe class="embed-responsive-item" src="<?php echo $current_chef['s_youku']; ?>" frameborder=0 allowfullscreen></iframe>
		      				</div>
						</div>
						<div class="col-md-6">
							<div class="ys_chef_menu_text">
								<?php echo $current_chef['s_text']; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="ys_chef_focus">
					<div id="carousel-example-generic" class="carousel slide ys_homefocus" data-ride="carousel">
				        <ol class="carousel-indicators">
				        <?php 
				        foreach ($focus_html as $k=>$v){
				        ?>
	         	 			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $k; ?>" class=""></li>
	         	 		<?php } ?>
				        </ol>
				        <div class="carousel-inner" role="listbox">
				        <?php foreach($focus_html as $k=>$v){?>
	          				<div class="item <?php if($k==0) echo "active";?>">
	            				<img data-src="" alt="First slide [1140x500]" src="<?php echo $v; ?>" data-holder-rendered="false">
	          				</div>
	          			<?php }?>
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
		$('.ys_like').click(function(){
			$.ajax({
				dataType : 'json',
				url	:	'/store/feedback/like/<?php echo $id; ?>',
				success : function(result){
					$('.ys_like em').html(result.count);
				}
			});
		});
		$('.ys_fav').click(function(){
			$.ajax({
				dataType : 'json',
				url	:	'/store/feedback/fav/<?php echo $id; ?>',
				success : function(result){
					$('.ys_fav em').html(result.count);
				}
			});
		});
	});
	</script>
</body>
</html>