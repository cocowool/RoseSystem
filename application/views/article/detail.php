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
						<?php echo $breadcrum; ?>
					</p>
				</div>
      			
      			<div class="ys_article">
      				<h1><?php echo $name; ?></h1>
      				<h2><?php echo $subtitle; ?></h2>
					<p class="ys_article_author">
						<?php 
						if( !empty($author) && !empty($photographer) ){
							if( $author == $photographer ){
								$prefix = '文/图&copy;' . $author;
							}else{
								$prefix = '文&copy;' . $author . ' 图&copy;' . $photographer . ' ' . $others;
							}
						}else{
							if( !empty($author) ){
								$prefix = '文&copy;' . $author;
							}
							
							if( !empty($photographer) ){
								$prefix .= ' 图&copy;' . $photographer;
							}
	
							$prefix .= ' ' . $others;
						}
						
						echo $prefix;
						?>
					</p>
      				<div class="ys_article_content">
      					<?php echo $content; ?>
      				</div>
      				<div class="ys_article_stat">
      					<p>
      						<span>阅读：</span><?php echo $click; ?>&nbsp;&nbsp;
      						<button type="button" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 喜欢 <?php echo $like; ?>
							</button>
      						<button type="button" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏 <?php echo $fav; ?>
							</button>
      					</p>
      				</div>
      				<div class="share-links">
						<!-- JiaThis Button BEGIN -->
						<div class="jiathis_style">
						<a class="jiathis_button_tsina"></a>
						<a class="jiathis_button_weixin"></a>
						<a class="jiathis_button_email"></a>
						<a class="jiathis_button_douban"></a>
						<a href="http://www.jiathis.com/share?uid=905086" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
						<a class="jiathis_counter_style"></a>
						</div>
						<script type="text/javascript" >
						var jiathis_config={
							data_track_clickback:true,
							summary:"",
							hideMore:false
						}
						</script>
						<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=905086" charset="utf-8"></script>
						<!-- JiaThis Button END -->						
					</div>
      				<div class="ys_article_comment">
      					<div class="ys_comment_recorder">
      						<?php 
      						if( isset($sess_data['gUsername']) and !empty($sess_data['gUsername']) ){
							?>
							<form name='commentForm' id='commentForm' method='post' action='/comment'>
								<div class="form-group">
									<label for="comment">评论内容：</label>
									<textarea rows="3" cols="" class="form-control" id="content" name="content"></textarea>
								</div>
								<div class="form-inline">
									<div class="form-group">
										<label form="verifycode">验证码：</label>
										<input type="text" id="verifycode" name="verifycode" class="form-control input-sm">
										<img src="http://www.yueshichina.com/register/captcha" />
									</div>
								</div>
								<p>&nbsp;
									<input type="hidden" id="ctype" name="ctype" value="1">
									<input type="hidden" id="cid" name="cid" value="<?php echo $id; ?>">
									<input type="hidden" id="userid" name="userid" value="<?php echo $sess_data['gUserid']; ?>">
								</p>
								<div class="form-group">
									<input type="button" id="btnComment" name="btnComment" value="提交" class="btn btn-primary">
									<span class="ys_ajax_msg"></span>
								</div>
							</form>
							<?php
							}else{
							?>
							<div>
								<p>发表留言，请先<a href="/user/login" class="ys_link_red">登录</a></p>
							</div>
							<?php
							}
      						?>
      					</div>
      					
      					<div class="ys_comment_list">
      							<?php 
      							if(isset($comment_list) and is_array($comment_list)){
      							foreach ($comment_list as $k=>$v){
								?>
      						<div class="ys_comment_item container-fluid">
      							<div class="row">
      								<div class="col-md-2">
      								<?php
      									if(empty($v['userinfo']['usericon'])){
      										echo "<img src='" . $this->config->item('default_icon') . "' width='50px' />";
      									}else{
											echo "<img src='" . $v['userinfo']['usericon'] . "' width='50px'>";
										}
      								?>
      								</div>
      								<div class="col-md-10">
      									<p><?php echo $v['userinfo']['username']; ?>&nbsp;&nbsp;<?php echo $v['insert_time']; ?></p>
      									<p><?php echo $v['content']; ?></p>
      								</div>
      							</div>
      						</div>
								<?php
								}
								}
      							?>
      					</div>
      				</div>
      				<div class="ys_article_related">
      					<h3>相关文章</h3>
      					<div class="ys_container">
      						<div class="row">
      						<?php
      						$count = 0;
      						$html = '';
      						foreach ($related_article as $k=>$v){
								$html .= '<div class="col-md-4"><div class="ys_thumbnail_block">';
								$html .= '<a href="/article/detail/'.$v['id'].'"><img src="' . $v['cover'] . '" /></a>';
								$html .= '<div class="ys_caption"><h3><a href="/article/detail' . $v['id'] . '">' . $v['name'] . '</a></h3></div></div></div>';
								$count++;
								if($count>2) break;
							}
							
							echo $html;
      						?>
      						</div>
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