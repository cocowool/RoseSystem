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
				<div class="ys_container">
					<div class="row">
						<div class="col-md-12">
							<ul class="ys_menu_nav">
							<?php
								$category_html = ''; 
								foreach ($category_list as $k=>$v){
									$class = '';
									if($v['id']==$current_category){
										$class='active';
									}
									$category_html .= '<li><a href="/article/'.$v['id'].'/1" class="'.$class.'">'.$v['category'].'</a></li>';
								}
								echo $category_html;
							?>
							</ul>
						</div>
					</div>
				</div>
      			
      			<div class="ys_container ys_article_list">
					<?php
					$article_html = '<div class="row ys_latest">'; 
					$article_row_count = 0;
					$article_html .= '';
					foreach($article_list as $k=>$v){
						$article_html .= '<div class="col-md-4"><div class="ys_thumbnail_block">';
						$article_html .= '<a href="/article/detail/'.$v['id'].'"><img src="'.$v['cover'].'" /></a>';
						$article_html .= '<div class="ys_caption"><h3><a href="/article/detail/'.$v['id'].'">'.$v['name'].'</a></h3>';
						$article_html .= '<p>'.$v['foreword'].'</p>';
						$article_html .= '</div></div></div>';
						
						$article_row_count++;
						if($article_row_count%3==0 and $article_row_count != 9){
							$article_html .= '</div><div class="row ys_latest hide">';
						}
					}
					$article_html .= '</div>';
					echo $article_html;
					?>
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