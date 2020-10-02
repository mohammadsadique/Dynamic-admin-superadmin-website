<?php session_start();  include('superadmin/dbconnect.php');
		
	session_unset();
	session_destroy();
	echo "<script>window.location.href='index.php'</script>";
		
		
		//print_r($_SESSION);
?>