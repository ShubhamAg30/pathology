<?php
		include ('function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
		  .dropdown-menu
		  {
			  color:white;
		  }
  	</style>
</head>
<body>
	<div class="conatiner-fluid" style="width:100%">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Pathology Management System(PMS)</a>
				</div>
				<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
				<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="view_profile.php">View Profile</a>
							<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
							<a class="dropdown-item" href="change_password.php">Change Password</a>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link" href="../index.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-center">
				<li class="nav-item">
					<a href="admin_dashboard.php" class="nav-link">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Patients Register</a>
					<div class="dropdown-menu">
						<a href="add_patients.php" class="dropdown-item">Add New Paitents</a>
						<a href="manage_patients.php" class="dropdown-item">Manage patients</a>
					</div>
				</li>
				<li class="nav-item">
					<a href="manage_patients.php" class="nav-link">Generate Report</a>
				</li>
			</ul>
		</div>
		</nav><br>
		<span><marquee>This is Pathology Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
		<div class="row"style="display: flex;justify-content: center;" >
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Registerd Patients </p></div>
					<div class="card-body"><p class="card-text">No.of total Paitents:<?php echo get_patient_count_value(); ?></p>
						<a href="manage_patients.php"class="btn btn-danger btn-block">View Registerd Patients</a>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-4">
					<div class="card bg-light" style="width:300px">
						<div class="card-header"><p>Issued Reports </p></div>
						<div class="card-body"><p class="card-text">No.of Generated Reports:<?php echo get_issued_report_count();?></p>
							<a href="view_issued_report.php"class="btn btn-warning btn-block">View Generated Reports</a>
						</div>
					</div>
				</div>
			</div> -->
			<div class="col-md-2"></div>
		</div>
		<br><br>
	</div>
</body>
</html>