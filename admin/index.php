<?php 	require('config.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin-login</title>
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
				<a class="navbar-brand" href="../index.php">Pathology Management System(PMS)</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link btn btn-info btn-md"style="color:white; margin:10px;" href="../user/index.php" >User Login </a>
				</li>	
			</ul>
		</div>
	</nav><br>
	<span><marquee>This is pathology Management System. pathology opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<div class="row">
	<div class="col-md-4" id="side_bar">
			<h5>Pathology Lab</h5>
			<ul>
				<li>Opening Timing: 8:00 AM</li>
				<li>Closing Timing: 8:00 PM</li>
				<li>Family's health is your real wealth.</li>
			</ul>
			<h5>What we provide ?</h5>
			<ul>
			<li>Blood Count Test</li>
				<li>Metabolic Test</li>
				<li>Liver Panel Test</li>
				<li>Thyroid Function Test</li>
				<li>Urine Test</li>
				<li>Blood Sugar Test</li>
			</ul>
		</div>	
		<div class="col-md-8" id="main_content">
			<center><h3>Admin Login Form</h3></center>
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Email ID:</label>
					<input type="email" name="email" autocomplete="off" autofocus class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Password:</label>
					<input type="password" name="password"autocomplete ="off" class="form-control" required>
				</div>
				<button type="submit" name="login" class="btn btn-outline-info btn-block">Login</button>
			</form>

			<?php
				session_start();
				if(isset($_POST['login'])){
					$query = "select * from admin where email = '$_POST[email]'";
					$query_run = mysqli_query($connection,$query);

					while($row = mysqli_fetch_assoc($query_run)){
						try{

							if($row['email'] == $_POST['email']) {
								if($row['password'] == $_POST['password']){
									$_SESSION['name'] = $row['name'];
									$_SESSION['email'] = $row['email'];
									$_SESSION['id'] = $row['id'];
									header("Location:admin_dashboard.php");
								}
								else{
									?>
									<br><br><center><span class="alert-danger">Wrong Password</span></center>
									<?php
								}
							}else
							{
								echo 'hello';die;
							}
						}catch(Exception $e){
							echo $e;
						}
					}
				}
			?>
	</div>
	</div>
</body>
</html>