<?php
	session_start();
	require('config.php');
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$old_password = $_REQUEST['old_password'];
		$new_password = $_REQUEST['new_password'];
		$query_1 = "select * from admin where email = '$_SESSION[email]'";
		$query_run_1 = $connection->query($query_1);
		$row_1 = $query_run_1->fetch_assoc();
		if($old_password == $row_1['password']){
			$query_2 = "update admin set password = '$new_password'";
			$query_run_2 = $connection->query($query_2);
		}
	}
	header("location:admin_dashboard.php");
?>

