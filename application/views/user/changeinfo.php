<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/changeinfo.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script src="/js/less-1.7.5.min.js"></script>
	<script src="/js/changinfo.js"></script>
</head>
<body>
	<div class="title">
		<span class="titleTxt">修改信息</span>
		<span onclick="location.href='/user/me/1'" class="return">返回</span>
	</div>
	<ul class="info_holder">
		<span class="info_title">基本信息</span>
		<li>
			<span class="info_li">
				用户名：<?=$_COOKIE['name']?>
			</span>
		</li>
		<li>
            <span class="info_li">
                身份：<select id="rank">
                <option value="1">工薪族</option>
                <option value="2">企业主</option>
                <option value="3">网店主</option>
            </select><script type="text/javascript">$('#rank').val(<?=$rank?>)</script>
            </span>
            <span class="reset" onclick="set(1)">确认修改</span>
        </li>
		<li>
			<span class="info_li">
				姓名：<?=($realname=='')?'<input id="realname" type="text" class="per_name" placeholder="提交后无法再次修改">':substr($realname,0,2).'*'?>
			</span>
		</li>
		<li>
			<span class="info_li">
				身份证号：<?=($peoid=='')?'<input id="peoid" type="text" class="per_name" maxlength="18" placeholder="提交后无法再次修改" style="padding-left: 5px;width: 150px">':substr($peoid,0,10).'*'?>
			</span>
			<?php if ($peoid=='') echo '<span id="once" class="reset" onclick="set(2)">提交</span>';?>
		</li>
		<span class="info_title">安全信息</span><br>
		<li class="safity">
            <span class="info_li">
                密码修改：<br>
            </span>
            <form id="form1" name="form" class="changewords" onsubmit="return set(3)">
                原密码：<input type="password" name="opsw"/><span class="tips">请输入原密码</span><br>
                新密码：<input type="password" name="psw" /><span class="tips">密码需要有5位以上</span><br>
                确认密码：<input type="password" name="rep" /><span class="tips">重复确认新密码</span><br>
                <input type="submit" value="提交修改" class="apply">
            </form>
        </li>
        <li class="safity">
            <span class="info_li">
               更改手机绑定：<br>
            </span>
            <form id="form2" class="changewords" onsubmit="return set(4)">
                原手机号：<input type="text" name="ophone"/><span class="tips">请输入原手机号</span><br>
                新手机号：<input type="text" name="phone" /><span class="tips">请输入新绑定的手机号</span><br>
                确认码：<input type="text" name="check" /><span class="tips"><span class="fasong">发送</span>请输入收到的确认码</span><br>
                <input type="submit" value="提交修改" class="apply">
            </form>
        </li>
	</ul>
</body>
</html>