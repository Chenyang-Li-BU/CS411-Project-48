<?php
	session_start();
	$_SESSION['usg']='';
	$_SESSION['name']='';
	$_SESSION['userid']='';
	$_SESSION['type']='';
	$_SESSION['t']='';
 unlink ('./token.json');
echo '   <script>  
    
        window.location="index.php"; 
     
    </script> ';
