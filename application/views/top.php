<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title></title>
        <meta name="description" content="">
        <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    </head>
    <body>
        <div id="header">
            <div id="header_top_outer">
                <div id="header_top_inner">
                    <div class="top_link"><span>客服热线：11111111 &nbsp&nbsp&nbsp&nbsp 关注我们：</span><a href="" class="weibo_logo"></a><a href="" class="wechat_logo"></a></div>
                    <?php if (array_key_exists('name', $_COOKIE)):?>
                        <span>Welcome back,<?=$_COOKIE['name']?></span>
                        <?php else:?><ul class="login_register">
                        <li class="register">注册</li>
                        <li class="login">登录</li>
                    </ul>
<script type="text/javascript" src="/js/login.js"></script>
        <div id="curtain"></div>
    <div id="login_register">
        <div class="close">x</div>
        <div class="interface">
            <ul>
                <li class="login_btn on_btn">登录</li>
                <li class="register_btn">注册</li>
            </ul>
            <form class="login_interface">
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
                    <input type="checkbox" name="checkbox" value="">&nbsp;&nbsp;记住我<a href="">忘记密码？</a>
                </div>
                <input class="submit" type="submit" name="submit" value="登录">   
            </form>
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
                    <img src="">
                    <div class="yanzheng">
                        <span class="reg_icon suo">&#xe61b;</span>
                        <input type="password" name="code">
                    </div>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="checkbox" value="check">&nbsp;&nbsp;我已阅读并同意<a href="">《会计师打开条款 》</a>
                </div>
                <input class="submit" type="submit" name="submit" value="下一步">
            </form>
        </div>  
    </div><?php endif;?>
                </div>
            </div>
            <div id="nav">
                <div class="logo">
                    掌金联盟
                </div>
                <ul>
                    <li><a href="">掌金宝</a></li>
                    <li><a href="">众筹</a></li>
                    <li class="nav_on"><a href="">掌金街</a></li>
                    <li><a href="">掌金论坛</a></li>
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