<?php
	require('config.php');
	require('function.php');
	date_default_timezone_set("Asia/Calcutta");

	$test_types = [];
	$i = 0;
	$query = "select * from test_type";
	$query_run = $connection->query($query);
	$patient_unique_id = "PATHO0021_".get_patient_count();
	
	while($row = $query_run->fetch_assoc()){
		$test_types[$i] = $row['test_type'];
		$i++;
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$p_id = trim($_REQUEST['patient_id']);
		$p_name = trim($_REQUEST['name']);
		$p_age = trim($_REQUEST['age']);
		$p_test_type = trim($_REQUEST['test_type_select']);
		$p_mobile = trim($_REQUEST['mobile_no']);
		$p_address = trim($_REQUEST['address']);

		$date = date('Y-m-d H:i:s');

		$query_2 = "insert into patients values (null, '$p_id', '$p_name', $p_age, '$p_test_type', '$p_address', '$p_mobile', '$date')";

		$query_3 = "insert into reports values (null, '$p_id', null, null, 'normal', 0, null, null)";

		// echo $query_3;die;
		$connection->query($query_3);

		if($connection->query($query_2) === TRUE){
			echo '<script>alert("Patient Successfully Added.")</script>';
			header('refresh:0;url= manage_patients.php');
		}else {
			echo '<script>alert('.$connection->error.')</script>';
		}
		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add patient</title>
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
  	</style>
</head>
<body>
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
				<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-center">
				<li class="nav-item">
					<a href="admin_dashboard.php" class="nav-link">Dashboard</a>
				</li>
			</ul>
		</div>
	</nav>
	<br>

	<span><marquee>This is pathology Management System :pathology opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-sm-6">
				<form method="post">
					<div class="form-group">
						<label for="email">PATIENT_ID</label>
						<input type="text" class="form-control" readonly name="patient_id" value="<?php echo $patient_unique_id; ?>" required>
					</div>
					<div class="form-group">
						<label for="email">NAME</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label for="email">AGE</label>
						<input type="number" class="form-control" name="age" required>
					</div>
					<div class="form-group">
						<label for="email">TEST TYPE</label>
						<select class="form-control" name="test_type_select">
						<option >-select-</option>
							<?php 
								foreach($test_types as $test_type){
									echo '<option type="text">'.$test_type.'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="email">MOBILE NO.</label>
						<input type="number" class="form-control" name="mobile_no" required>
					</div>
					<div class="form-group">
						<label for="email">ADDRESS</label>
						<input type="text" class="form-control" name="address" required>
					</div>
					<input type="submit" class="btn btn-info btn-block" value="Submit">
				</form>
				<br><br><br>
		  	</div>
				<div class="col-sm-3"></div>
		</div>
	</div>
	
</body>
</html>
