<?php
    require('function.php');
	require('config.php');
	
	$i = 0;
	$patients = [];
	$reports = [];
	$query_1 = "select * from patients";
	$query_2 = "select * from reports";
	$query_run_1 = $connection->query($query_1);
	$query_run_2 = $connection->query($query_2);

	while($row_1 = $query_run_1->fetch_assoc()){
		$patients[$i] = $row_1;
		$i++;
	}

	$i = 0;
	while($row_2 = $query_run_2->fetch_assoc()){
		$reports[$i] = $row_2;
		$i++;
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<style type="text/css">
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}

		table {
			counter-reset: tableCount;     
		}
		.counterCell:before {              
			content: counter(tableCount); 
			counter-increment: tableCount; 
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

	<span><marquee>This is Pathology Management System. Pathology opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered table-hover">
					<thead class="thead-dark">
						<tr>
							<th>S.No</th>
							<th>PATIENT ID</th>
							<th>TEST TYPE</th>
							<th>NAME</th>
							<th>AGE</th>
							<th>PHONE</th>
							<th>STATUS</th>
							<th>ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 0;
							$j = 0;
							while($i < count($patients)){
								while($j < count($reports)){?>
									<?php if($patients[$i]['patient_id'] == $reports[$j]['patient_id']){?>
										<tr>
											<td class="counterCell"></td>
											<td><?php  echo $patients[$i]['patient_id']; ?></td>
											<td><?php  echo $patients[$i]['test_type']; ?></td>
											<td><?php  echo $patients[$i]['name']; ?></td>
											<td><?php  echo $patients[$i]['age']; ?></td>
											<td><?php  echo $patients[$i]['mobile_no']; ?></td>
											<td><?php  echo $reports[$j]['status'] ? 'SUCCESS' : "PENDING";?></td>
											<td>
											<div class="btn-group">
												<a href="delete_report.php?id=<?php echo $reports[$j]['id'];?>&id1=<?php echo $patients[$i]['patient_id'];?>" data-toggle="tooltip" data-placement="bottom" title="Delete Report" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
												<?php if($reports[$j]['status']){?>
													<a href="view_report.php?id=<?php echo $reports[$j]['id'];?>" data-toggle="tooltip" data-placement="bottom" title="View Report" class="btn btn-outline-warning"><i class="fa fa-eye"></i></a>
												<?php }?>
												<?php if(!$reports[$j]['status']){?>
													<!-- <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Report"><i class="fa fa-trash"></i></button> -->
													<a href="generate_report.php?id=<?php echo $reports[$j]['id'];?>" data-toggle="tooltip" data-placement="bottom" title="Add Report" class="btn btn-outline-success"><i class="fa fa-book"></i></a>
												<?php }?>
											</div>
											</td>
										</tr>
									<?php break;}?>
								<?php 
									$j++;
								}?>
							<?php 
								$i++;
							}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
