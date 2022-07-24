<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin/bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="admin/bootstrap-4.4.1/js/juqery_latest.js"></script>
      <script type="text/javascript" src="admin/bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="user/css/app.css">
	  <style type="text/css">
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 600px;
			  
  		}
	  </style>
	  
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Pathology Management System(PMS)</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link btn btn-outline-primary"style="margin:5px; color:white;" href="admin/index.php">ADMIN</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-outline-success"style="margin:5px;color:white;"href="user/index.php">USER</a>
				</li>
			</ul>
		</div>
	</nav><br>
	<span><marquee>This is pathology Management System. Pathology opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<div class="row">
		<div class="col-md-4" id="side_bar">
			<h5>Pathology lab</h5>
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
		<img src = "image/image.jpg"alt="image" width="870" height="600">
		</div>
	</div><br>
	<footer style=" background-color:">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </footer>
</body>
</html>