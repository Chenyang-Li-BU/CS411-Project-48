<?php
echo ' <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="./st/css/font.css">
        <link rel="stylesheet" href="./st/css/index.css">
        <link rel="stylesheet" href="./st/css/iconfont.css">
        <script src="./st/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./st/js/index.js"></script>';
header('content-type:text/html;charset=utf-8');

$conn=mysqli_connect('localhost','root','1eabe54e44f826dd','shujutijiao') or die('false');
mysqli_query($conn,'set names utf8');

