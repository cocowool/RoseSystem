	<nav class="navbar ys_header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 ys_search">
					<p><input type='text' name='ys_site_search' id='ys_site_search' /><a href="#">搜索</a></p>
				</div>
				<div class="col-md-8">
					<?php 
					if( $this->session->userdata('gUsername') != '' ){
					?>
					<p>
							<a href="/user/detail"><?php echo $this->session->userdata('gUsername'); ?></a>
							<a href="/user/logout" id='loginBtn'>注销</a>
					</p>
					<?php
					}else{
					?>
					<form name='ys_login' id='ys_login' method='post' action='/user/login'>
					<p>
						<a href="/user/register">注册</a>
							<input type='text' name='username' id='username' >
							<input type='password' name='password' id='password' />
							<a href="javascript:void(0);" id='loginBtn'>登录</a>
							<a href="javascript:void(0);">忘记密码</a>
					</p>
					</form>
					<?php 
					}
					?>
				</div>
			</div>
		</div>
	</nav>