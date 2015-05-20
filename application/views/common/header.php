	<nav class="navbar ys_header">
		<div class="container">
			<div class="navbar-collapse collapse">
			
					<?php 
					if( isset($sess_data['gUsername']) and !empty($sess_data['gUsername'])){
					?>
					<p class="ys_top_info">
							<a href="/user/detail"><?php echo $this->session->userdata('gUsername'); ?></a>
							<a href="/user/logout" id='loginBtn'>注销</a>
					</p>
					<?php
					}else{
					?>
					<form name='ys_login' id='ys_login' method='post' class='navbar-form navbar-right' action='/user/login'>
						<a href="/user/register">注册</a>
						<div class="form-group">
							<input type='text' name='username' id='username' placeholder="请输入用户名" class="form-control input-sm" >
						</div>
						<div class="form-group">
							<input type='password' name='password' id='password' placeholder="请输入密码" class="form-control input-sm" >
						<input type='hidden' name='referer' id='referer' value='<?php echo current_url(); ?>' />
						</div>
						<a href="javascript:void(0);" id='loginBtn'>登录</a>
						<a href="javascript:void(0);">忘记密码</a>
					</form>
					<?php 
					}
					?>
			</div>
			<div class="row hide">
				<div class="col-md-4 ys_search">
					<p><input type='text' name='ys_site_search' id='ys_site_search' /><a href="#">搜索</a></p>
				</div>
				<div class="col-md-8 ys_top_login">
				</div>
			</div>
		</div>
	</nav>