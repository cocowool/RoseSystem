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
							foreach ($forum_list as $k=>$v){
				
							}

							echo $forum_html;
						}
      					?>
      					<div class="row">
      						<div class="col-md-4 col-sm-0 col-xs-0">
      							<div class="media">
      								<div class="media-left">
	      								<a href="javascript:void(0);"><img class="media-object" src="/temp/H1.jpg"/></a>
      								</div>
      								<div class="media-body">
      									<h4 class="media-heading">侯晓文</h4>
      									<p>宫保鸡丁的食材选择</p>
      								</div>
      							</div>
      						</div>
      						<div class="col-md-8 col-sm-12 col-xs-12">
      							
      						</div>
      					</div>
      				</div>
      				<div class="ys_fest_carnival">
      				
      				</div>
      				<div class="ys_fest_consultant">
      				
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

	</script>
</body>
</html>