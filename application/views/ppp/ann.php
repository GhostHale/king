<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>  
<title>公告列表</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/announce.css">
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<span class="main_nav"><a href="/ppp/main">首页 </a>> <a href="">公告列表</a></span>
		<h1>最新公告</h1>
		<ul class="announce_list" id="list">
		</ul>
		<div class="page" id="page"></div>
	</div>
	    <script type="text/javascript">
        function showData(data){
            var res='';
            for (x in data){
                res+='<li>';
                res+='<a href="/ppp/main/anndetail/'+data[x].id+'">'+data[x].title+'</a><span>'+data[x].time+'</span>';
                res+='</li>';
            }
            $('#list').html(res);
        }
        function beforeLoad(){
          $('#list').html('数据载入中，请稍候……');
        }
    </script>
    <script type="text/javascript" src="/js/listview.js"></script>
<?php include(APPPATH.'views/foot.php');?>