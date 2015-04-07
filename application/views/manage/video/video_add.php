<h1>视频管理</h1>
<div class="rs_submenu">
	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    		视频分类
    		<span class="caret"></span>
  		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">分类列表</a></li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">新增分类</a></li>
		</ul>
	</div>
	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    		视频列表
    		<span class="caret"></span>
  		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">视频列表</a></li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="/manage/video/add">新增视频</a></li>
		</ul>
	</div>
</div>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<?php echo $html_form; ?>
	</div>
</div>