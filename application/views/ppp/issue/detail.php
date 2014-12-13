<!DOCTYPE html>
<html>
    <head>
        <title>掌金宝</title>
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="/css/zhongchou_detail.css">
<?php include(APPPATH.'views/top.php');?>
    <div id="main">
        <span class="main_nav"><a href="">首页</a> > <a href="">众筹</a> > <a href="">项目名称</a></span>
        <div class="content">
            <div class="content_top">
                <img class="big_img" src="">
                <div class="program_infro">
                    <div class="progress">
                        <h2>意筹到</h2>
                        <h1>￥1100000</h1>
                        <p>此项目必须在<span class="red">2014年1月1日</span>前得到<span class="red">￥1000</span>的支持才成功！剩余<span class="red">1</span>天</p>
                        <div class="progress_line" style="width:268px;"></div>
                        <div class="support">
                            <span>1000</span>名支持者
                            <button>我要支持</button>
                        </div>
                    </div>
                    <div class="org">
                        <h1>项目发起人</h1>
                        <div class="org_infro">
                            <img src="">
                            <span class="org_name">姓名</span>
                            <span>公司名</span>
                            <div>发起：<span class="red">1</span>&nbsp;&nbsp;&nbsp;&nbsp;支持：<span class="red">1</span><a href=""></a></div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="slider_box">
                <span class="left"></span>
                <span class="right"></span>
                <div class="con_slider">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                
                
            </div>
            <p class="intro">介绍介绍介绍dsfsdafdgadsgsadgsadhfljdsijfijasdlgjsahdjkglhjkahsdgjhsadlkghjksldhjkfhlsadhf asdlhgjdahgjhjsadklh sdhfalhdaj shdfalkjhadkjh jdhaslk hjfsodagj ajgpjsj
            </p>
            <p class="intro">
                <img class="" src=""><!--放证书等-->
                <img class="" src=""><!--放证书等-->
                <img class="" src=""><!--放证书等-->
            </p>
            <p class="intro">介绍介绍介绍介绍dsfsdafdgadsgsadgsadhfljdsijfijasdlgjsahdjkglhjkahsdgjhsadlkghjksldhjkfhlsadhf asdlhgjdahgjhjsadklh sdhfalhdaj shdfalkjhadkjh jdhaslk hjfsodagj ajgpjsj
            </p>
        </div>
    </div>
<script type="text/javascript">
    $('.good_program a').on('mouseover',function(){
        $(this).addClass('good_program_focus');
    });
    $('.good_program a').on('mouseout',function(){
        $(this).removeClass('good_program_focus');
    });
    var len = $('.con_slider li').length;
    $('.con_slider ul').css('width',len*334+'px');
    var x = 0;
    function float(obj,len){
        if (obj.css('left')==-(len-3)*334+'px') {
            x = 0;
            obj.animate({left:-x+'px'}); 
        }else{
            x += 334;
            obj.animate({left:-x+'px'}); 
        }
    }
    $('.left').on('click',function(){
        if (x==0) {
            clearInterval(ss);
            ss = setInterval("float($('.con_slider ul'),len)",3000);
        }else{
            x -= 668;
            clearInterval(ss);
            float($('.con_slider ul'),len);
            ss = setInterval("float($('.con_slider ul'),len)",3000);
        }
    });
    $('.right').on('click',function(){
        if (x==(len-3)*334) {
            clearInterval(ss);
            ss = setInterval("float($('.con_slider ul'),len)",3000);
        }else{
            clearInterval(ss);
            float($('.con_slider ul'),len);
            ss = setInterval("float($('.con_slider ul'),len)",3000);
        }   
    });
    var ss = setInterval("float($('.con_slider ul'),len)",3000);
</script>
<?php include(APPPATH.'views/foot.php');?>