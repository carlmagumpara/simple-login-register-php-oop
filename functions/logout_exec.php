<?php  
	require_once('../functions/session.php');
	session_unset();
	session_destroy();
	setcookie('PHPSESSID','',time()-3600,'/');
	header('location: ../index.php');
?>