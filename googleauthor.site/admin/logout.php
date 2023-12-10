<?php
	session_start();
	$_SESSION['username']='';
	$_SESSION['name']='';
	$_SESSION['userid']='';
	$_SESSION['type']='';
	$_SESSION['t']='';

echo '   <script>  
    
        window.top.location="login.php"; 
     
    </script> ';
