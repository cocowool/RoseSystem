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
					<div class="row">
						<div class="col-md-12">
							<ul class="ys_menu_nav">
								<li><a href="/video" class="<?php echo ($current_category==0)?'active':''; ?>">全部</a></li>
							<?php
								$category_html = ''; 
								foreach ($category_list as $k=>$v){
									$class = '';
									if($v['id']==$current_category){
										$class='active';
									}
									$category_html .= '<li><a href="/video/'.$v['id'].'" class="'.$class.'">'.$v['category'].'</a></li>';
								}
								echo $category_html;
							?>
							</ul>
						</div>
					</div>
				</div>
      			
      			<div class="ys_container ys_article_list">
					<?php
					$article_html = '<div class="row">'; 
					$article_row_count = 0;
					$article_html .= '';
					foreach($video_list as $k=>$v){
						$article_html .= '<div class="col-md-6"><div class="ys_video_item_container">';
						$article_html .= '<a target="_blank" href="/video/detail/'.$v['id'].'"><img src="'.$v['v_thumb'].'" /><div class="ys_btn_container"><div class="ys_playerbtn"></div></div></a>';
						$article_html .= '<div class="ys_caption"><h3><a target="_blank" href="/video/detail/'.$v['id'].'">'.$v['v_title'].'</a></h3>';
						$article_html .= '<p>'.$v['v_desc'].'</p>';
						$article_html .= '</div></div></div>';
						
						$article_row_count++;
						if($article_row_count%3==0 and $article_row_count != 9){
							$article_html .= '';
						}
					}
					$article_html .= '</div>';
					echo $article_html;
					?>
      			</div>
					
		      	<div class="row">
		      	<?php if(!empty($video_list)){ ?>
		      		<div class="ys_ajaxmore">
		      			<p><a href="javascript:void(0);">点击加载更多精彩内容 </a></p>
		      		</div>
		      	<?php } ?>
		      		<div class="ys_loading hide">
		      			<p><span><img src='/templates/yueshi/images/big_load.gif' ></span></p>
		      		</div>
				<?php 
				if(!empty($page_links)){
				?>
			      	<nav class="ys_pagelink hide">
			      		<?php echo $page_links; ?>
			      	</nav>
		      	<?php 
		      	}
		      	?>
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
	<script type="text/javascript" src="/libs/jquery-plugin/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="/templates/yueshi/js/main.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		var $container = $('.ys_article_list .row');
		$container.imagesLoaded(function(){
			$container.masonry({
			  itemSelector: '.col-md-6',
			  isAnimated: true,
			  resizeable: true
			});
		});

		$('.ys_ajaxmore a').click(function(){
			var maxitem = 8;
			if($('.ys_article_list .row>div').length >= maxitem){
				$('.ys_pagelink').removeClass('hide');
				$('.ys_ajaxmore').hide();
			}else{
				$.ajax({
					'type'	:	'POST',
					'dataType'	:	'json',
					'url'	:	'/video/serverside/<?php echo $current_category ?>',
					'data'	:	{
						'pagesize'	:	'4',
						'category'	:'<?php echo $current_category; ?>',
						'start'	:	$('.ys_article_list .row>div').length + <?php echo $page; ?>
					},
					'beforeSend'	:	function(){
						$('.ys_ajaxmore').hide();
						$('.ys_loading').removeClass('hide');
					},
					'success'	:	function(result){
						if(result.length==0){
							$('.ys_loading').hide();
							$('.ys_ajaxmore').removeClass('hide').show();
							$('.ys_ajaxmore p').html('没有更多内容了');
						}else{
							$('.ys_loading').hide();
							var elements = [];
							$.each(result,function(k,v){
								$('.ys_article_list .row').append('<div class="col-md-6"><div class="ys_video_item_container"><a target="_blank" href="/video/detail/'+v.id+'"><img src="'+v.v_thumb+'"><div class="ys_btn_container"><div class="ys_playerbtn"></div></div></a><div class="ys_caption"><h3><a target="_blank" href="/video/detail/'+v.id+'">'+v.v_title+'</a></h3><p>'+v.v_desc+'</p></div></div></div>');
							});

							$container.masonry('destroy');
							$container.imagesLoaded(function(){
								$container.masonry({
									  itemSelector: '.col-md-6',
									  isAnimated: true,
									  resizeable: true
								});
							});
	
							if($('.ys_article_list .row>div').length >= maxitem){
								$('.ys_pagelink').removeClass('hide');
							}else{
								$('.ys_ajaxmore').show();
							}
						}
					}
				});
			}			
		});		
		
	});
	</script>
</body>
</html>