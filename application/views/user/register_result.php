<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<title>悦食中国</title>
	<link rel="stylesheet" href="/static/lib/yui<?php echo $this->config->item('fd_yui_version'); ?>/cssnormalize/cssnormalize-min.css" />
	<link rel="stylesheet" href="/static/lib/yui<?php echo $this->config->item('fd_yui_version'); ?>/cssfonts/cssfonts-min.css" />
	<link rel="stylesheet" href="/static/lib/yui<?php echo $this->config->item('fd_yui_version'); ?>/cssgrids-responsive/cssgrids-responsive-min.css" />
	<link rel="stylesheet" media="screen" href="/templates/yueshi/css/computer.css" />
	<link rel="stylesheet" media="handheld" href="/templates/yueshi/css/mobile.css" />
</head>
<body>
<div class="body">
	<div class="yui3-u-1">
		<div id="header">
			<h1><a href="/">悦食中国</a></h1>		
		</div>
	</div>
	<div class="yui3-g">
		<div class="yui3-u-3-4">
			<div class="register-result">
				<p><?php echo $status; ?></p>
				<p><?php echo $errmsg; ?></p>
			</div>
			<div class="hackbox"></div>
		</div>
		<div class="yui3-u-1-4">
			<div id="site-logo">
				<h2><a href="/" title="<?php echo $this->config->item('site_title'); ?>" alt="<?php echo $this->config->item('site_title'); ?>"><?php echo $this->config->item('site_title'); ?></a></h2>
				<div class="site-date">
					<p><?php echo date('Y', time()); ?></p>
					<p><?php echo date('m', time()); ?></p>
					<p><?php echo date('d', time()); ?></p>
				</div>
			</div>
			<div id="menu-block" class="tie1">
				<div class="main-menu-container">
					<?php $this->load->view('common/menu'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="yui3-u-1">
		<?php $this->load->view('common/footer'); ?>
	</div>
</div>
	<script type="text/javascript" src="/static/lib/jquery1.9.1/jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
		$(window).ready(function(){
			$('.main-menu-item').hover(function(){
				$(this).addClass('sub-menu-on');
				$(this).children('.main-menu-text').next().show();
			}, function(){
				$(this).removeClass('sub-menu-on');
				$(this).children('.main-menu-text').next().hide();
			});
		});
	</script>
	<?php $this->load->view('common/ga'); ?>
</body>
</html>