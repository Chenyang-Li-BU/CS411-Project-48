<?php
include('conn.php');
session_start();
$username=$_POST['username'];
$password=$_POST['password'];



	
$sql="select * from user_table where username='$username' and password='$password' and access_level ='admin'";
$rs=mysqli_query($conn,$sql);

if($row=mysqli_fetch_assoc($rs)){
	
	$t=date('Y-m-d H:i',time());
	$ids=$row['id'];
	
	
	$_SESSION['username']=$row['username'];
	$_SESSION['name']=$row['name'];
	$_SESSION['userid']=$row['id'];
	
	header('Location:index.php');
}else{
	echo "<script>alert('password false');</script>";	
	echo "<script>location.href='login.php'</script>";
}

	


	