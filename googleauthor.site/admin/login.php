﻿<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>admin</title>
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="./st/css/font.css">
    <link rel="stylesheet" href="./st/css/login.css">
	  <link rel="stylesheet" href="./st/css/index.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="./st/lib/layui/layui.js" charset="utf-8"></script>

</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up" style="margin-top: 90px">
        <div class="message">Admin</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" action="checklogin.php" method="post">
            <input name="username" placeholder="username"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="password"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="Submit" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    
    <!-- 底部结束 -->
   
</body>
</html>