<?php
include('conn.php');
session_start();

$id=$_POST['id'];
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
$sql="update  datas set Max='$name',Min='$a',Clothing='$s',flag='$d',Weather='$f' ,detail='$g' ,img='$img' where id ='$id'";
}else{
  $sql="update  datas set Max='$name',Min='$a',Clothing='$s',flag='$d',Weather='$f' ,detail='$g'  where id ='$id'";
}

$r=mysqli_query($conn,$sql);

if($r){
    echo "<script>alert('success');</script>";
}else{
    echo "<script>alert('false');</script>";
}
echo "<script>location.href='u_list.php'</script>";
?>
