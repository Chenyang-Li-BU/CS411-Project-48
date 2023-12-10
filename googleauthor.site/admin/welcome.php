<?php
include('conn.php');
$sql="select count(*) as c,class from jxxx group by class";
$rs=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>welcome</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <!--<link rel="stylesheet" href="./css/font.css">-->
        <link rel="stylesheet" href="./st/css/index.css">
        <link rel="stylesheet" href="./st/css/iconfont.css">
        <script src="./st/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./st/js/index.js"></script>
        <script src="./st/js/jquery.js"></script>
        <script src="./st/js/jquery.min.js"></script>
        <script src="./st/js/survey.js"></script>
         <script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>
        <style>
            #FontScroll{
                width: 100%;
                height: 245px;
                overflow: hidden;
            }
            #FontScroll ul li{
                height: 32px;
                width: 100%;
                color: #ffffff;
                line-height: 32px;
                overflow: hidden;
                font-size: 14px;
            }
            #FontScroll ul li i{
                color: red;
            }
            .layui-table td, .layui-table th{
                min-width: auto !important;
            }
        </style>
    </head>

    <body>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <blockquote class="layui-elem-quote">Welcome：
                                <span class="x-red" >admin</span>
                                <span id="time"></span>
                            </blockquote>
                        </div>
                    </div>
                </div>
           
                
           
                

           
              


                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <p style="text-align: center;"> Admin.</p>
                             <div id="main" style="width: 600px;height:400px;background: white"></div>
                        </div>
                    </div>
                </div>


   

            </div>
        </div>
        </div>
    </body>

    <script src="./st/js/echarts.min.js"></script>
    <script type="text/javascript">
       



        
    </script>
    <script src="js/fontscroll.js"></script>

</html>