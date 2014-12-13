<!DOCTYPE html>
<html>
<head>
<title>注册新用户</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/register.css">
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<div class="main_tit">
			<h1>注册新用户</h1>
		</div>
		<div id="register">
		<div class="interface">
			<form class="register_interface">
				<div class="box">
					<label>用户名</label>
					<div>
						<span class="reg_icon">&#xe625;</span>
						<input type="text" name="user">
						<h5 class="warn"></h5>
					</div>
				</div>
				<div class="box">
					<label>邮箱</label>
					<div>
						<span class="reg_icon suo">&#xe624;</span>
						<input type="email" name="mail">
						<h5 class="warn"></h5>
					</div>
				</div>
				<div class="box">
					<label>手机号</label>
					<div>
						<span class="reg_icon suo">&#x3462;</span>
						<input type="text" name="phone">
						<h5 class="warn"></h5>
					</div>
				</div>
				<div class="box">
					<label>密码</label>
					<div>
						<span class="reg_icon suo">&#xe61b;</span>
						<input type="password" name="psw">
						<h5 class="warn"></h5>
					</div>
				</div>	
				<div class="box">
					<label>重复密码</label>
					<div>
						<span class="reg_icon suo">&#xe61b;</span>
						<input type="password" name="confirm_password">
						<h5 class="warn"></h5>
					</div>
				</div>
				<div class="box">
					<label>验证码</label>
					<div class="yanzheng">
						<span class="reg_icon suo">&#xe61b;</span>
						<input type="password" name="code">
					</div>
					<input class="button" type="button" value="发送验证码到手机">
				</div>
				<div class="checkbox">
					<input type="checkbox" name="checkbox" value="check">&nbsp;&nbsp;我已阅读并同意<a href="">《闪电贷网站服务协议》</a>
				</div>
				<input class="submit" type="submit" name="submit" value="提交">
			</form>
		</div>	
	</div>
	</div>
<script type="text/javascript">
	$('.top_left li').on('click',function(){
		$(this).parent().find('.select').removeClass('select');
		$(this).addClass('select');
	});
$('.right .submit').bind('click',function(event){
	var status1 = false;
	$(function(){
    	if ($('.right .checkbox').attr('checked')=='checked') {
    		status1=true;
    	};
	});
	if (status1) {
		$('.right .submit').submit();
	}else{
		event.preventDefault()
	}
});
$('.right .money').on('blur',function(){
	var ben = parseInt($('.right .money').val());
	var rate = 0;
	$('.income').text('');
});
$('.list li').on('click',function(){
	var index = $(this).index();
	$('.list_under').css('display','none');
	if (index == 0) {
		$('.per_detail').css('display','block');
	}else if (index == 1) {
		$('.record').css('display','block');
	}else{
		$('.bd_detail').css('display','block');
	}
	$('.li_on').removeClass('li_on');
	$(this).addClass('li_on');
});
</script>
<?php include(APPPATH.'views/foot.php');?>