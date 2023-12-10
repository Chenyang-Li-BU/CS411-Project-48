<?php
include('conn.php');
$id=$_GET['id'];
session_start();

$sql="select * from datas where id=$id";
$rs=mysqli_query($conn,$sql);

if(mysqli_num_rows($rs)){
      $row=mysqli_fetch_assoc($rs);
}
else{
      echo'没有数据!';exit;
}

?>
 <!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8" />
<title>admin</title>	
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
</script>
<script type="text/javascript" charset="utf-8" src="./utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./utf8-php/ueditor.all.min.js"> </script>
        <script type="text/javascript" charset="utf-8" src="./utf8-php/lang/zh-cn/zh-cn.js"></script>
</head> 	
 <div>
      	<div>
      		<h4>Update</h4>
      		<form action="u_update_save.php" method="post" enctype="multipart/form-data">
      			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
      			
					 <input type="hidden" name="id" value="<?php echo $row['id']?>">
      			<tr>
                <td align="right" bgcolor="#FFFFFF" width="10%">Max</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="movie_name" class="layui-input" value="<?php echo $row['Max']?>"/></td>    
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">Min</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="release_year" class="layui-input" value="<?php echo $row['Min']?>"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">Clothing</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="director" class="layui-input" value="<?php echo $row['Clothing']?>"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">flag</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="writers" class="layui-input" value="<?php echo $row['flag']?>"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">Weather</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="duration" class="layui-input" value="<?php echo $row['Weather']?>"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">detail</td>
                <td align="left" bgcolor="#FFFFFF"><input type="text" name="summary" class="layui-input" value="<?php echo $row['detail']?>"/></td>   
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF">IMG</td>
                <td align="left" bgcolor="#FFFFFF"><input type="file" name="file" class="layui-input"/></td>   
              </tr>
                                     
      				
      				<td width="5%" bgcolor="#FFFFFF" align="right"></td>
					<td align="left" bgcolor="#FFFFFF">	
					<input type="submit" value="提交" class="layui-btn">
					</td>
				</table>
      			 </form>
      	</div>

            <script type="text/javascript">
                  var ids=$('select[name=ban]').attr('sid');
                  
                  $('select[name=ban] option[value='+ids+']').attr('checked',true)
            </script>
      </div><script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
