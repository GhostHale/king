<!DOCTYPE HTML>
<head>
    <title>后台登陆入口</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
<div id="login_register" style="display:block">
        <div class="interface">
            <form class="login_interface" id="login" method="post">
                <div class="box">
                    <div class="username">
                        <input type="text" name="user" placeholder="请输入账号">
                    </div>
                </div>
                <div class="box">
                    <div class="password">
                        <input type="password" name="psw" placeholder="请输入密码">
                    </div>
                </div><input type="text" name="code" placeholder="验证码" /><img src="/user/vcode" />
                <input class="submit" type="submit" onclick="return login()" value="登录">   
            </form>
        </div>  
</div>
</body>