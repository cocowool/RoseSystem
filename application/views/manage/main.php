<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>RoseCMS管理后台</title>
	<meta name="keyword" content="">
	<meta name="description" content="">
	<link rel="icon" href="/favicon.ico">
	<link href="/libs/bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/libs/bootstrap-3.3.4/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<link href="/templates/manage/css/main.css" rel="stylesheet" media="screen">
	<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><?php echo $this->config->item('project_name'); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-3 col-md-2 sidebar">
	        	<ul class="nav nav-sidebar">
	            	<li class="active"><a href="#">概览 <span class="sr-only">(current)</span></a></li>
	            	<li><a href="#">文章管理</a></li>
	            	<li><a href="#">活动管理</a></li>
	            	<li><a href="#">会员管理</a></li>
	          	</ul>
	          	<ul class="nav nav-sidebar">
	            	<li><a href="">二维码</a></li>
	            	<li><a href="">视频管理</a></li>
	          	</ul>
	        </div>
	        
	        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          		<h1 class="page-header">Dashboard</h1>

          	</div>
    	</div>
    </div>
    
	<script type="text/javascript" src="/libs/jquery/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/libs/bootstrap-3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/templates/yueshi/js/main.js"></script>
</body>
</html>