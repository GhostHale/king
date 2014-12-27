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
			<form class="register_interface" name="form">
				<div class="box">
					<label>用户名</label>
					<div>
						<span class="reg_icon">&#xe625;</span>
						<input type="text" name="user" maxlength="18">
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
						<input type="text" name="code">
					</div>
					<input class="button" type="button" value="发送验证码到手机">
				</div>
				<div class="checkbox">
					<input id="check" type="checkbox" onchange="window.code(this)" checked="checked">&nbsp;&nbsp;我已阅读并同意<a href="">《闪电贷网站服务协议》</a>
				</div>
				<input class="submit" type="submit" name="submit" onclick="return sub()" value="提交">
			</form>
		</div>	
	</div>
	</div>
	<script type="text/javascript" src="/js/register.js"></script>
<?php include(APPPATH.'views/foot.php');?>