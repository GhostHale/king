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
        <div class="service">
            <div class="service_btn">

            </div>
            <div class="up"></div>
        </div>
    </div>
    <div id="back_top">
        <div class="kefu"></div>
        <div class="top"></div>
    </div>
</body>
<script type="text/javascript" src="/js/main.js"></script>
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
        };  
    });
</script>
</html>