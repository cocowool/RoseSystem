<nav class="navbar ys_navbar">
	<div class="container">
    	<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        	<span class="sr-only">显示导航</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
			<form name='ys_search' id='ys_search' method='post' class='navabar-form ys_search_form' action=''>
				<div class='form-group'>
					<input type='text' name='ys_site_search' id='ys_site_search' class="form-control input-sm" placeholder='输入搜索的内容' />
				</div>
				<a href="javascript:void(0);">搜索</a>
			</form>	
		</div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
				<?php 
				if( isset($sess_data['gUsername']) and !empty($sess_data['gUsername'])){
				?>
				<div class="navbar-right">
					<a href="/user/detail" class=""><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $this->session->userdata('gUsername'); ?></a>&nbsp;&nbsp;
					<a href="/user/logout" id='loginBtn'>注销</a>
				</div>
				<?php
				}else{
				?>
				<form name='ys_login' id='ys_login' method='post' class='navbar-form navbar-right' action='/user/login'>
					<div class="form-group">
						<input type='text' name='username' id='username' placeholder="请输入用户名" class="form-control input-sm" >
					</div>
					<div class="form-group">
						<input type='password' name='password' id='password' placeholder="请输入密码" class="form-control input-sm" >
					<input type='hidden' name='referer' id='referer' value='<?php echo current_url(); ?>' />
					</div>
					<a href="javascript:void(0);" id='loginBtn'>登录</a>
					<a href="javascript:void(0);">忘记密码</a>
					<a href="/user/register">注册</a>
				</form>
				<?php 
				}
				?>
			</div><!--/.navbar-collapse -->
	</div>
</nav>