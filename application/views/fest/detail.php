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
      				<div class="ys_fest_nav">
      					<ul class="ys_menu_nav">
      						<li><a href="javascript:void(0);" class="active">2014</a></li>
      						<li><a href="javascript:void(0);">2015</a></li>
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
      				
      				</div>
      				<div class="ys_fest_carnival">
      				
      				</div>
      				<div class="ys_fest_consultant">
      				
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

	</script>
</body>
</html>