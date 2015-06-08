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
      					foreach ($fest_list as $k=>$v){
	      					$style = '';
							if($v['id'] == $current_fest['id']) $style = 'active';
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
								$forum_html .= 	'<a target="_blank" href="javascript:void(0);"><img class="media-object" src="'.$v['f_person'].'"/></a>';
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
								$forum_html .= '<a target="_blank" href="'.$url.'"><img src="'.$v['f_focus'].'" /></a></div>';
							}
							$forum_html .= '</div></div>';
							
			
							echo $forum_html;
						}
      					?>
      					<div class="ys_go_top">
      						<p class="hide"><a href="#top">回到顶部</a></p>
      					</div>
      				</div>
      				<div class="ys_fest_carnival">
      					<h4 class="ys_column_title">悦食市集嘉年华</h4>
      					<?php 
      					if(empty($carnival_list)){
							echo '<p>暂时没有内容</p>';
						}else{
							$carnival_html = '';
							$carnival_html .= '<div class="ys_carnival">';
							$carnival_html .= '<ul class="ys_menu_nav">';
							foreach ($carnival_list as $k=>$v){
								$style = '';
								if($k==0) $style = 'active';
								$carnival_html .= '<li><a target="_blank" href="javascipt:void(0);" class="'.$style.'">'.$v['f_title'].'</a></li>';
							}
							$carnival_html .= '</ul></div>';
							//顶部导航结束
							$carnival_html .= '<div class="ys_carnival_list">';
							$carnival_html .= '<div id="ys-carnival-focus" class="carousel slide" data-ride="carousel">';
							$carnival_html .= '<ol class="carousel-indicators">';
							foreach ($carnival_list as $k=>$v){
								$style = '';
								if($k==0) $style = 'active';
								$carnival_html .= '<li data-target="#carousel-example-generic" data-slide-to="'.$k.'" class="'.$style.'"></li>';
							}
							$carnival_html .= '</ol>';
							$carnival_html .= '<div class="carousel-inner" role="listbox">';
							foreach ($carnival_list as $k=>$v){
								$style = '';
								if($k==0) $style = 'active';
								$carnival_html .= '<div class="item '.$style.'">';
								$carnival_html .= '<img src="'.$v['f_thumb'].'" alt="">';
								$carnival_html .= '<div class="carousel-caption"></div>';
								$carnival_html .= '</div>';
							}
							$carnival_html .= '</div>';
							$carnival_html .= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">';
							$carnival_html .= '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
							$carnival_html .= '<span class="sr-only">Previous</span></a>';
							$carnival_html .= '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">';
							$carnival_html .= '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
							$carnival_html .= '<span class="sr-only">Next</span></a>';
							$carnival_html .= '</div></div>';
      					
							echo $carnival_html;
      					} ?>
      					<div class="ys_go_top">
      						<p class="hide"><a href="#top">回到顶部</a></p>
      					</div>
      				</div>
      				<div class="ys_fest_consultant">
      					<h4 class="ys_column_title">悦食顾问</h4>
      					<?php 
      					if(empty($consultant_list)){
							echo '<p>暂时没有内容</p>';
						}else{
							$consultant_html = '<div class="ys_consultant_list row">';
							foreach ($consultant_list as $k=>$v){
								$style = '';
								if($k==0) $style = 'active';
								$consultant_html .= '<div class="col-xs-3 col-md-1 col-sm-4">';
								$consultant_html .= '<a target="_blank" href="javascript:void(0);" class="thumbnail" data-toggle="tooltip" title="'.$v['f_name'].'" data-placement="top"><img src="'.$v['f_pic'].'" /></a>';
								$consultant_html .= '</div>';
							}
							$consultant_html .= '</div>';
							$consultant_html .= '<div class="ys_consultant_detail">';
							foreach ($consultant_list as $k=>$v){
								$consultant_html .= '<div class="row ys_consultant_desc"><div class="col-md-2 col-xs-1"></div>';
								$consultant_html .= '<div class="col-md-8 col-xs-10 row">';
								$consultant_html .= '<div class="col-md-4">';
								$consultant_html .= '<a target="_blank" href="javascript:void(0);" class="thumbnail"><img src="'.$v['f_pic'].'" /></a>';
								$consultant_html .= '</div>';
								$consultant_html .= '<div class="col-md-6 ys_consultant_resume_container">';
								$consultant_html .= '<h4>'.$v['f_name'].'</h4>';
								$consultant_html .= '<div class="ys_consultant_resume">'.$v['f_desc'].'</div>';
								$consultant_html .= '</div></div><div class="col-md-2 col-xs-1"></div></div>';
								$consultant_html .= '<div class="row ys_consultant_words">'.$v['f_words'].'</div>';
							}
							$consultant_html .= '</div>';
							
							echo $consultant_html;
						}
      					?>
      					<div class="ys_go_top">
      						<p class="hide"><a href="#top">回到顶部</a></p>
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