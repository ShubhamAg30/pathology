<?php

session_start();

	require('config.php');
	$name=$_POST['name'];
	$email= $_POST['email'];
	$query = "update admin set name  ='$name',email='$email'where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	if($query_run)
	{  
		$_SESSION['name']=$name;
		$_SESSION['email']=$email;
		header("Location:admin_dashboard.php");
	}
	?>

<!-- <script type="text/javascript"> -->
	<!-- alert("Updated successfully...");
	window.location.href = "admin_dashboard.php";
</script> -->
