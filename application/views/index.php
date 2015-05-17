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
				<div id="carousel-example-generic" class="carousel slide ys_homefocus" data-ride="carousel">
				<?php 
				if(!empty($focus_list)){
				?>
			        <ol class="carousel-indicators">
			        	<?php 
			        	foreach ($focus_list as $k=>$v){
							if($k==0){
								$style = 'active';
							}else{ $style = ''; }
							echo '<li data-target="#carousel-example-generic" data-slide-to="'.$k.'" class="'.$style.'"></li>';
						}
			        	?>
			        </ol>
			        <div class="carousel-inner" role="listbox">
			        <?php 
			        foreach ($focus_list as $k=>$v){
						if($k==0){
							echo '<div class="item active">';
						}else{
							echo '<div class="item">';
						}
						echo '<a href="'.$v['f_link'].'"><img data-src="" alt="'.$v['f_title'].'[1140x500]" src="'.$v['f_img'].'" data-holder-rendered="false"></a>';
						echo '</div>';
					}
			        ?>
        			</div>
        			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          				<span class="sr-only">Previous</span>
        			</a>
        			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          				<span class="sr-only">Next</span>
        			</a>
        		<?php 
        		}else{
					echo "暂时没有焦点图";
				}
        		?>
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