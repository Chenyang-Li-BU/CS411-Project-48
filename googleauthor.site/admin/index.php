<?php
include('conn.php');
session_start();

if(!isset($_SESSION['userid'])){
  echo "<script>location.href='login.php'</script>";
    /* alert('请登录以后再操作!','login.php');*/
	exit;
}else{
  if(empty($_SESSION['userid'])){
    echo "<script>location.href='login.php'</script>";
     /* alert('请登录以后再操作!','login.php');*/
    }
}
?>
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="./st/css/font.css">
        <link rel="stylesheet" href="./st/css/index.css">
        <link rel="stylesheet" href="./st/css/iconfont.css">
        <script src="./st/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./st/js/index.js"></script>
 <script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>
    </head>
    <body class="index">
      
        <div class="container">
            <div class="logo">
                <a href="./st/index.html">Weather</a>
                 <a style="color: white;float: right;">Welcome</a>

            </div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>

            </div>






        </div>
      
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a href="../index.php" >
                            <i class="layui-icon left-nav-li" lay-tips="首页">&#xe68e;</i>
                            <cite>Index</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>

                    </li>
                     
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="movie">&#xe6a2;</i>
                            <cite>Weather</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                        
                            <li>

                                <a onclick="xadmin.add_tab('Weather','u_list.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>List</cite></a>
                            </li>	
                      
                            <li>
                                <a onclick="xadmin.add_tab('Weather','u_new.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>New</cite></a>
                            </li>
                            
                        </ul>


                    </li>
                 

                     
                   
                 <li>
                        <a href=" logout.php">
                            
                            <cite>Logout</cite>
                            </a>

                    </li>  
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>my</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                       
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='./welcome.php' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->

    </body>
    <script src="jsst//jquery.min.js"></script>

</html>

<script>
    window.onload=function () {
        var click=document.getElementById('new-nav');
        var news=document.getElementById('news');
        click.addEventListener('mousemove',function () {
            news.style.display='block';
        });
        click.addEventListener('mouseout',function () {
            news.style.display='none';
        });

        var gonggao=document.getElementById('gonggao');
        var gonggaos=document.getElementById('gonggaos');
        gonggao.addEventListener('mousemove',function () {
            gonggaos.style.display='block';
        });
        gonggao.addEventListener('mouseout',function () {
            gonggaos.style.display='none';
        });
    }




</script>

