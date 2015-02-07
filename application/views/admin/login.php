<!DOCTYPE HTML>
<head>
    <title>后台登陆入口</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../../../king/css/login.css">
</head>
<body>
<div id="login_register">
        <div class="interface">
            <h1></h1>
            <form class="login_interface" id="login" method="post">
                <div class="box">
                    <label>账号</label>
                    <div class="username">
                        <input type="text" name="user" placeholder="请输入账号">
                    </div>
                </div>
                <div class="box">
                    <label>密码</label>
                    <div class="password">
                        <input type="password" name="psw" placeholder="请输入密码">
                    </div>
                </div>
                <label>验证码</label>
                <div>
                     <input class="code" type="text" name="code" placeholder="验证码" /><img src="/user/vcode" />
                    <input class="submit" type="submit" onclick="return login()" value="登录"> 
                </div>
            </form>
        </div>  
</div>
</body>