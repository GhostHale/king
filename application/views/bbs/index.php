<!DOCTYPE html>
<html>
<head>
    <title>掌金论坛</title>
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/bbs.css">
<?php include(APPPATH.'views/top.php');?>
    <div id="main">
        <ul class="nav">
            <li class="active" content="now">全部</li>
            <li>官方公告</li>
            <li>最新发帖</li>
            <li>最火话题</li>
            <a href="/bbs/main/newone" class="nav_btn">我要发帖</a>
            <span class="nav_btn">我的帖子</span>
        </ul>
        <ul id="bbs_list">
        </ul>
        <div id="page">
        </div>
    </div>
    <script type="text/javascript">
        function showData(data){
            var res='';
            for (x in data){
                res+='<li>';
                var tou;
                switch (data[x].tou){
                    case 1:tou='/upload/pic/'+data[x].id+'tou'+'.jpg';break;
                    case 2:tou='/upload/pic/'+data[x].id+'tou'+'.jpeg';break;
                    case 3:tou='/upload/pic/'+data[x].id+'tou'+'.png';break;
                    default:tou='/images/person.png';
                }
                res+='<div class="usr_photo"><img src="'+tou+'"></div>';
                res+='<div class="bbs_topic"><a href="/bbs/main/item/'+data[x].id+'"><h3>'+data[x].title+'</h3></a><p>'+data[x].content+'</p></div>';
                res+='<div class="bbs_data"><span>发帖人：'+data[x].name+'</span><br /><br /><span>回复总数：'+data[x].reply+'</span></div>';
                res+='</li>';
            }
            $('#bbs_list').html(res);
        }
        function beforeLoad(){
            $('#bbs_list').html('数据载入中，请稍候……');
        }
    </script>
    <script type="text/javascript" src="/js/listview.js"></script>
<?php include(APPPATH.'views/foot.php');?>