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
					<h1><a href="javascript:void(0);">YUESHI CHINA</a></h1>
				</div>
				
      			
      			<div class="ys_container">
					<?php
					$article_html = '<div class="row">'; 
					$article_row_count = 0;
					$article_html .= '';
					foreach($chef_list as $k=>$v){
						$article_html .= '<div class="col-md-6 col-xs-12"><div class="ys_video_item_container">';
						$article_html .= '<a target="_blank" href="/video/detail/'.$v['id'].'"><img src="'.$v['s_thumb'].'" /></a>';
						$article_html .= '</div></div><div class="col-md-6 col-xs-12"><div class="ys_chef_text"><h3><a target="_blank" href="/video/detail/'.$v['id'].'">'.$v['s_title'].'</a></h3>';
						$article_html .= '<p>'.$v['s_desc'].'</p>';
						$article_html .= '</div></div>';
						
						$article_row_count++;
						if($article_row_count%3==0 and $article_row_count != 9){
							$article_html .= '</div><div class="row ys_latest hide">';
						}
					}
					$article_html .= '</div>';
					echo $article_html;
					?>
					
					<?php 
					if(!empty($page_links)){
					?>
			      	<div class="row">
			      		<div class="ys_ajaxmore">
			      			<p><a href="javascript:void(0);">点击加载更多精彩内容 </a></p>
			      		</div>
			      	</div>	
			      	<?php 
			      	}
			      	?>
			      	
			      	<div class="row">
			      		<div class="ys_pagelink hide">
				      		<?php echo $page_links; ?>
			      		</div>
			      	</div>
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
	<script type="text/javascript" src="/templates/yueshi/js/main.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		var count = 1;
		$('.ys_ajaxmore a').click(function(){
			if(count == 3){
				$('.ys_ajaxmore').hide();
				$('.ys_pagelink').show();
				$('.ys_pagelink').removeClass('hide');
			}
			$.ajax({
				'type'	:	'POST',
				'url'	:	'/video/serverside/<?php echo $current_category ?>/1',
				'data'	:	{
					'count'	:	1
				},
				'success'	:	function(result){
					$('.ys_article_list .hide').first().removeClass('hide');
				}
			});
		});
	});
	</script>
</body>
</html>