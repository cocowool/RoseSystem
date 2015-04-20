<div class="rs_container">
	<div class="rs_form_result">
		<h1>页面跳转</h1>
		<p class="<?php echo $content_data['class']; ?>">
			<?php
				if(!empty($content_data['user_text'])){
					echo $content_data['user_text'];
				}
			?>
		</p>
		<p class="<?php echo $content_data['class']; ?>"><?php echo $content_data['text']; ?></p>
		<p class="text-danger">页面将在 <b id="timer">3</b> 秒之后跳转</p>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	function jump(count) {    
        window.setTimeout(function(){    
            count--;    
            if(count > 0) {    
                console.log(count);
                $('#timer').html(count);    
                jump(count);    
            } else {    
                location.href="<?php echo $content_data['url']; ?>";    
            }    
        }, 1000);    
    }    
    jump(3);	
});
</script>