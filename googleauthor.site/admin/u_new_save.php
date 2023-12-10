
<?php
include('conn.php');
session_start();
$uid=$_SESSION['userid'];
mysqli_query($conn,"set names utf8");//设置数据库编码格式utf8
/* 检测连接是否成功 */
if (!$conn) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* 检测是否生成MySQLi_STMT类 */
$stmt = mysqli_prepare($conn, "insert into datas (Max,Min,Clothing,flag,Weather,detail,img) VALUES (?, ?, ?, ?, ?, ?, ?)");
if ( !$stmt ) {
    die('mysqli error: '.mysqli_error($conn));
}
/* 获取POST提交数据 */
$name=$_POST['movie_name'];
 $a=$_POST['release_year'];
 $s=$_POST['director'];
 $d=$_POST['writers'];
 $f=$_POST['duration'];
 $g=$_POST['summary'];
if(!empty($_FILES["file"]["name"])){
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
      
        if (file_exists("uplode/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
            $fname=time();
        	$img=$fname.'.'.$extension;
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "./uplode/" . $img);
        }
    }
}
}else{
   $img='';
}


/* 参数绑定 */
mysqli_stmt_bind_param($stmt, 'sssssss',$name, $a, $s, $d, $f, $g, $img);
/* 执行prepare语句 */
mysqli_stmt_execute($stmt);
/* 根据执行结果，跳转页面 */
if(mysqli_stmt_affected_rows($stmt)){
    echo "<script>alert('success');</script>";
}else{
    echo "<script>alert('flass');</script>";
}
echo "<script>location.href='u_list.php'</script>";
?>