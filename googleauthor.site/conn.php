<?php
header('content-type:text/html;charset=utf-8');
date_default_timezone_set('Asia/Shanghai');
$conn=mysqli_connect('localhost','root','1eabe54e44f826dd','shujutijiao') or die('false');
mysqli_query($conn,'set names utf8');

