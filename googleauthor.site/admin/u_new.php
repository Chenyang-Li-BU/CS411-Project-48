
<?php
include('conn.php');
$sql="select * from zy ";
$rs=mysqli_query($conn,$sql);

?>
 <!DOCTYPE html>
<html>
<head>	
       
     <script type="text/javascript" charset="utf-8" src="./utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./utf8-php/ueditor.all.min.js"> </script>
        <script type="text/javascript" charset="utf-8" src="./utf8-php/lang/zh-cn/zh-cn.js"></script>
	<meta charset="utf-8" />
<title>admin</title>	
<style>
.tr {
	font-family: "微软雅黑,Verdana, 新宋体";
	color:black;/*标题字体色*/
	font-size:21px;
	font-weight:bolder;
	background:#a8c7ce;/*标题背景色*/
</style>
</head> 	
 <div>
      	<div>
      		
      		<form action="u_new_save.php" method="post" enctype="multipart/form-data">
      			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
      				<tr>
			<td colspan="2" align="left" class="tr">Temperature</td>
			</tr>
					<tr>
      					<td align="right" bgcolor="#FFFFFF" width="10%">Max</td>
      					<td align="left" bgcolor="#FFFFFF"><input type="text" name="movie_name" class="layui-input"/></td>		
      				</tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">Min</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="release_year" class="layui-input"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">Clothing</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="director" class="layui-input"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">flag</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="writers" class="layui-input"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">Weather</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="duration" class="layui-input"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">detail</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="summary" class="layui-input"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">Img</td>
                <td align="left" bgcolor="#FFFFFF"><input type="file" name="file" class="layui-input"/></td>   
              </tr>
      			
                                   
      				
      				<td width="5%" align="right"></td>
					<td align="left">	
					<input type="submit" class="layui-btn" value="提交"/>
					</td>
				</table>
      			 </form>
      	</div>
      </div>