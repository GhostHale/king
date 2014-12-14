<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>掌金论坛</title>
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/bbs.css">
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script>
        $(function(){
            var aLi=$('.nav>li');
            console.log(aLi.length);
            aLi.mouseenter(function(){
                this.className='active';
            });
            aLi.mouseleave(function(){
                $('[content!="now"]').removeClass('active');
            });
        });
    </script>
</head>
<body>
<div id="header">
    <div id="header_top_outer">
        <div id="header_top_inner">
            <div class="top_link"><span>客服热线：11111111 &nbsp&nbsp&nbsp&nbsp 关注我们：</span><a href="" class="weibo_logo"></a><a href="" class="wechat_logo"></a></div>
            <ul class="login_register">
                <li class="register">注册</li>
                <li class="login">登录</li>
            </ul>
        </div>
    </div>
    <div id="nav">
        <div class="logo">
            掌金联盟
        </div>
        <ul>
            <li><a href="">掌金宝</a></li>
            <li><a href="">众筹</a></li>
            <li><a href="">掌金街</a></li>
            <li class="nav_on"><a href="">掌金论坛</a></li>
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
    <div id="main">
        <ul class="nav">
            <li class="active" content="now">全部</li>
            <li>官方公告</li>
            <li>最新发帖</li>
            <li>最火话题</li>
            <span class="nav_btn">我要发帖</span>
            <span class="nav_btn">我的帖子</span>
        </ul>
        <ul class="bbs_list">
            <li>
                <div class="usr_photo">
                    <img src="images/person.png">
                </div>
                <div class="bbs_topic">
                    <h3>帖子标题</h3>
                    <p>帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略</p>
                </div>
                <div class="bbs_data">
                    <span>发帖人：掌金宝</span><br><br>
                    <span>回复总数：1000</span>
                </div>
            </li>
            <li>
                <div class="usr_photo">
                    <img src="images/person.png">
                </div>
                <div class="bbs_topic">
                    <h3>帖子标题</h3>
                    <p>帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略</p>
                </div>
                <div class="bbs_data">
                    <span>发帖人：掌金宝</span><br><br>
                    <span>回复总数：1000</span>
                </div>
            </li>
            <li>
                <div class="usr_photo">
                    <img src="images/person.png">
                </div>
                <div class="bbs_topic">
                    <h3>帖子标题</h3>
                    <p>帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略</p>
                </div>
                <div class="bbs_data">
                    <span>发帖人：掌金宝</span><br><br>
                    <span>回复总数：1000</span>
                </div>
            </li>
            <li>
                <div class="usr_photo">
                    <img src="images/person.png">
                </div>
                <div class="bbs_topic">
                    <h3>帖子标题</h3>
                    <p>帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略</p>
                </div>
                <div class="bbs_data">
                    <span>发帖人：掌金宝</span><br><br>
                    <span>回复总数：1000</span>
                </div>
            </li>
            <li>
                <div class="usr_photo">
                    <img src="images/person.png">
                </div>
                <div class="bbs_topic">
                    <h3>帖子标题</h3>
                    <p>帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略</p>
                </div>
                <div class="bbs_data">
                    <span>发帖人：掌金宝</span><br><br>
                    <span>回复总数：1000</span>
                </div>
            </li>
            <li>
                <div class="usr_photo">
                    <img src="images/person.png">
                </div>
                <div class="bbs_topic">
                    <h3>帖子标题</h3>
                    <p>帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略</p>
                </div>
                <div class="bbs_data">
                    <span>发帖人：掌金宝</span><br><br>
                    <span>回复总数：1000</span>
                </div>
            </li>
            <li>
                <div class="usr_photo">
                    <img src="images/person.png">
                </div>
                <div class="bbs_topic">
                    <h3>帖子标题</h3>
                    <p>帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略帖子内容简略</p>
                </div>
                <div class="bbs_data">
                    <span>发帖人：掌金宝</span><br><br>
                    <span>回复总数：1000</span>
                </div>
            </li>
        </ul>
        <div class="page">
            <span class="btn_page1">首页</span>
            <span class="btn_page2 btn_page1">上一页</span>
            <ul>
                <li style="margin-left: 10px">
                    <a>1</a>
                </li>
                <li>
                    <a>2</a>
                </li>
                <li>
                    <a>3</a>
                </li>
                <li>
                    <a>4</a>
                </li>
                <li>
                    <a>......</a>
                </li>
                <li>
                    <a>10</a>
                </li>
                <li>
                    <a>11</a>
                </li>
                <li>
                    <a>12</a>
                </li>
            </ul>
            <span class="btn_page2 btn_page1">下一页</span>
            <span class="btn_page1">末页</span>
        </div>
    </div>
    <div id="footer">
        <div class="footer_link">
            <h3>关注我们</h3>
            <a href="" class="iconfont">&#xf000a;<span>新浪微博</span></a>
            <a href="" class="iconfont">&#xe6b6;<span>腾讯微博</span></a>
            <a href="" class="iconfont">&#xe64b;<span>微信</span></a>
            <a class="hot">客服热线：11111111</a>
        </div>
        <div class="copyright">
            Copyright©2014 掌金联盟 zhangjin.com 版权所有
        </div>
        
    </div>
    <div class="service">
            <div class="service_btn">

            </div>
            <div class="up"></div>
    </div>
    <div id="curtain"></div>
    <div id="login_register">
        <div class="close">x</div>
        <div class="interface">
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
        </div>  
</div>
</body>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">
    $('.up').on('click',function(){
        $(window).scrollTop(0);
    });
    $(function(){   
        $('.service').css({"position":"absolute","top":$(window).scrollTop()+300+'px',"right":"4%"});
    });
    $('body').on('mousewheel',function(){
        if ($(window).scrollTop()<=$('body').height()-$(window).height()) {
            $('.service').css({"position":"absolute","top":$(window).scrollTop()+300+'px',"right":"4%"});
            $('#curtain').css('top',$(window).scrollTop()+'px');
        };  
    });
</script>
<script type="text/javascript" src="js/login.js"></script>
</html>
