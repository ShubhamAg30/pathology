<?php
	include '../admin/config.php';

	$data = [];
	$data["error"] = "";
	$data["message"] = "";

	if($_SERVER['REQUEST_METHOD']== 'POST'){
		try{
			$patient_id = trim($_REQUEST['patient_id']);
			$phone = trim($_REQUEST['mobile_no']);

			$query_1 = "select * from patients where patient_id = '$patient_id' and mobile_no = '$phone';";
			$result_1 = $connection->query($query_1);

			if(!$result_1->num_rows) throw new Exception("Correct Patient Id and Mobile Number is required.");

			$patient = $result_1->fetch_assoc();
			
			$query_2 = "select * from reports where patient_id	= '$patient_id' and status = 1;";
			$result_2 = $connection->query($query_2);
			$report = $result_2->fetch_assoc();

			if(!$result_2->num_rows) throw new Exception("Report is pending, check after some time.");

			$data["message"] = "Patient Id and Mobile Number is Corret. Click on generate to get the reports.";

		}catch(Exception $e){
			$data["error"] = $e->getMessage();
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>User-login</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
      <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/app.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="../index.php">The Pathology, A Diagnostic CENTER</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<!-- <li class="nav-item">
					<a class="nav-link" href="../admin/index.php">Admin Login</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link btn btn-info" style="margin:5px;color:black" href="index.php" >Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-primary" style="margin:5px;color:black" href="signup.php">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-danger"style="margin:5px; color:black" href="../index.php">Logout</a>
				</li> -->
			</ul>
		</div>
	</nav><br>
	<span><marquee>This is Pathology Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<div class="row">
		<div class="col-md-4" id="side_bar">
			<h5>pathology Timing</h5>
			<ul>
				<li>Opening Timing: 8:00 AM</li>
				<li>Closing Timing: 8:00 PM</li>
				<li>(Sunday off)</li>
			</ul>
			<h5>What we provide ?</h5>
			<ul>
				<li>Blood Test</li>
				<li>Urine Test</li>
				<li>malaria Test</li>
				<li>Blood Pressure</li>
				<li>Suger Test</li>
				<li>Peacefull Environment</li>
			</ul>
		</div>		
		<div class="col-md-8" id="main_content">
			<center><h3>View all your Test Reports</h3></center>
			<?php 
				if($data["error"]){
					echo '<div class="alert alert-danger">'.$data["error"].'</div>';
				}
			?>
			<?php 
				if($data["message"]){
					$report_id = $report['id'];
					$url = "view_report_user.php?id=".$report_id;
					echo '<div class="alert alert-success">'.$data["message"].'</div>';
					echo ("<script LANGUAGE='JavaScript'>
						window.alert('Redirecting to the report page.');
						window.location.href='$url';
						</script>");
				}
			?>
			<form action="" method="post">
				<div class='row'>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="name">Patient ID:</label>
							<input type="text" name="patient_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="name">Mobile No :</label>
							<input type="text" name="mobile_no" class="form-control" required>
						</div>
						
						<button type="submit" name="login" class="btn btn-outline-info btn-block">View Report</button>
			</form>
					</div>
				</div>

	</div>
	</div>
</body>
</html>