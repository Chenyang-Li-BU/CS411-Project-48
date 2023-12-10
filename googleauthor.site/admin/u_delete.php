<?php
include('conn.php');


$id=$_GET['id'];

if(!is_numeric($id)){
	alert('ID值不是一个数字','staff_list.php');exit;
}	
	
	$sql="delete from datas where id=$id";
	$r=mysqli_query($conn,$sql);
	
	if($r){
    echo "<script>alert('success');</script>";
}else{
    echo "<script>alert('false');</script>";
}
echo "<script>location.href='u_list.php'</script>";

