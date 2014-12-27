<meta charset="utf-8"/> 
<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div id="header">
    <div id="header_top_outer">
        <div id="header_top_inner">
            <div class="top_link"><span>客服热线：11111111 &nbsp&nbsp&nbsp&nbsp 关注我们：</span><a href="" class="weibo_logo"></a><a href="" class="wechat_logo"></a></div>
            <ul class="login_register"><?php if (isset($_COOKIE['name'])):?>
                <li class='quit' style='border-right: 1px dashed #979797;'><a href="/user/logout">退出</a></li><li>Welcome back,<?=$_COOKIE['name']?></li></ul>
                <?php else:?>
                <li class="register">注册</li>
                <li class="login">登录</li>
            </ul>
    <div id="curtain"></div>
<div id="login_register">
        <div class="close">x</div>
        <div class="interface">
            <form class="login_interface" id="login">
                <div class="box">
                    <div class="username">
                        <input type="text" name="user" placeholder="请输入手机号/邮箱">
                    </div>
                </div>
                <div class="box">
                    <div class="password">
                        <input type="password" name="psw" placeholder="请输入密码">
                    </div>
                </div>  
                <div class="checkbox">
                    <input type="checkbox" name="save" value="">&nbsp;&nbsp;记住我<a href="">忘记密码？</a>
                </div>
                <input class="submit" type="submit" onclick="return login()" value="登录">   
            </form>
        </div>  
</div>
<script type="text/javascript" src="/js/login.js"></script>
<?php endif;?>
            </div>
        </div>
        <div id="nav">
            <div class="logo">
                掌金联盟
            </div>
            <ul id="nav_type">
                <li><a href="/ppp/main">掌金宝</a></li>
                <li><a href="/zhong/main">众筹</a></li>
                <li><a href="/shop/main">掌金街</a></li>
                <li><a href="/bbs/main">掌金论坛</a></li>
            </ul>
        </div>
        <div id="banner">
            <ul class="banner_con">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <ul class="banner_slider">
                <li class="slider_focus"></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>