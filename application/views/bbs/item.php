<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/less" href="/css/single.less">
    <script src="/js/less-1.7.5.min.js"></script>
    <script>
        function delHtmlTag(str)
        {
            var str=str.replace(/<\/?[^>]*>/gim,"");//去掉所有的html标记
            var result=str.replace(/(^\s+)|(\s+$)/g,"");//去掉前后空格
            return  result.replace(/\s/g,"");//去除文章中间空格
        }
        $(function(){
            var a=$('.comment').height()+$('.comment_list').height()+100;
            $('.comment').css('height',a);
            var h=$('.art_box').height()+200;
            var aReply=$('.reply');
            var oInput=$('#comment_input');
            aReply.click(function(){
                var b=this.parentNode.parentNode;
                var m=$(b).find('.com_value').html();
                if(m.length>50)
                {
                   m=m.substr(0,50)
                }
                m=delHtmlTag(m);
                oInput[0].value='回复：'+m+'...';
                scrollTo(0,h);
            });
        });
    </script>
<?php include(APPPATH.'views/top.php');?>
<div id="main">
    <ul class="tyle_nav">
        <li><a>首页 ></a></li>
        <li><a>掌金论坛 ></a></li>
        <li class="active"><?=$title?></li>
    </ul>
    <div class="article">
        <h2><?=$title?></h3>
            <p class="art_inf">楼主:<span><?=$name?></span>时间:<span><?=$time?></span>点击:<span>0</span>回复:<span id="rep">0</span></p>
            <div class="art_box"><?=$content?></div>
    </div>
    <div class="comment">
        <div class="com_input">
            <p>
                <span class="h2">我要评论</span>
                <span>文明上网理性发言，请遵守新闻评论服务协议</span>
            </p>
            <div class='txt_box'>
                <textarea placeholder="发表一下你的想法吧..." id="comment_input"></textarea>
                <input type="button" value="发表评论" id="apply">
            </div>
            <ul class="comment_list">
                <li>
                    <div class="usr_left">
                        <div class="usr_photo">
                            <img src="images/person.png">
                        </div>
                    </div>
                    <div class="usr_right">
                        <p class="usr_inf">
                            <span class="usr_name">回帖人姓名</span>
                            <span>2014-12-23</span>
                        </p>
                            <div class="commentTxt">
                                <div class="com_value">
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容
                                    回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                    复内容 回复内容 回复内容 回复内容 回复内容回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                </div>
                            </div>
                            <div class="opt_box">
                                <span class="opt">(10)</span>
                                <span class="reply">回复(10)</span>
                            </div>
                        </div>
                    </li>
                <li>
                    <div class="usr_left">
                        <div class="usr_photo">
                            <img src="images/person.png">
                        </div>
                    </div>
                    <div class="usr_right">
                        <p class="usr_inf">
                            <span class="usr_name">回帖人姓名</span>
                            <span>2014-12-23</span>
                        </p>
                        <div class="commentTxt">
                            <div class="com_value">
                                回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                复内容 回复内容 回复内容 回复内容 回复内容
                                回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                复内容 回复内容 回复内容 回复内容 回复内容
                                回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                            </div>
                        </div>
                        <div class="opt_box">
                            <span class="opt">(10)</span>
                            <span class="reply">回复(10)</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="usr_left">
                        <div class="usr_photo">
                            <img src="images/person.png">
                        </div>
                    </div>
                    <div class="usr_right">
                        <p class="usr_inf">
                            <span class="usr_name">回帖人姓名</span>
                            <span>2014-12-23</span>
                        </p>
                        <div class="commentTxt">
                            <div class="reply_area">
                                <span class="reply_font">回复 用户名：</span>/*被回复用户之前的话*/回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                            </div>
                            <div class="com_value">
                                回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                复内容 回复内容 回复内容 回复内容 回复内容
                                回复内容回复内容 回复内容 回复内容 回复内容回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回复内容 回复内容 回复内容 回复内容 回复内容  回复内容回
                                复内容 回复内容 回复内容 回复内容 回复内容
                                回复内容回复内容 回复内容 回复内容 回复内容
                            </div>
                        </div>
                        <div class="opt_box">
                            <span class="opt">(10)</span>
                            <span class="reply">回复(10)</span>
                        </div>
                    </div>
                </li>
                <div class="load_more">
                    <spa class="load_btn">加载更多...</spa>
                </div>
            </ul>
        </div>
    </div>
</div>
<?php include(APPPATH.'views/foot.php');?>