<?php
	require('../admin/config.php');
	date_default_timezone_set("Asia/Calcutta");

	$report_id = $_GET['id'];
	$query_2 = "select * from reports where id = '$report_id'";
	$query_run_2 = $connection->query($query_2);
	$report = $query_run_2->fetch_assoc();
    
	$patient_id = $report['patient_id'];

	$query_1 = "select * from patients where patient_id = '$patient_id'";
	$query_run_1 = $connection->query($query_1);
	$patient = $query_run_1->fetch_assoc();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = trim($_REQUEST['id']);
		$cause = trim($_REQUEST['cause']);
		$remark = trim($_REQUEST['remark']);
		$description = trim($_REQUEST['description']);
		
		$query_3 = "update reports set cause = '$cause', report_condition = '$remark', description = '$description', status = 1  where id = $id";
		
		if($connection->query($query_3) === TRUE){
			echo '<script>alert("Report Generated Successfully.")</script>';
			header('refresh:0;url= manage_patients.php');
		}else {
			echo '<script>alert('.$connection->error.')</script>';
		}
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

	<div class="container mb-3">
		<div style="overflow: hidden;">
			<h2 style="text-align:center;">Generate Report</h2>
			<h4 style="text-align:right;"><?php echo date('M-d-Y');?></h4>
		</div>
		<hr>

		<div class="row">
		  	<div class="col-sm-6">
			  	<div class="card">
					<div class="card-header" style="text-align:center;">PATIENT DETAILS</div>
					<div class="card-body">
		  				<p>NAME : <?php echo $patient['name'];?></p>
						<p>AGE : <?php echo $patient['age'];?></p>
						<p>MOBILE : <?php echo $patient['mobile_no'];?></p>
						<p>ADDRESS : <?php echo $patient['address'];?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header" style="text-align:center;">REPORT DETAILS(1)</div>
					<div class="card-body">
						<p>PATIENT_ID : <?php echo $report['patient_id'];?></p>
						<p>TEST TYPE : <?php echo $patient['test_type'];?></p>
							<p>CAUSE : <?php echo $report['cause'];?></p>
							<p>REMARK : <?php echo $report['report_condition'];?></p>
					</div>
				</div>
			</div>
		</div><hr>
		<div class="row">
		  	<div class="col-sm-12">
			  	<div class="card">
					<div class="card-header" style="text-align:center;">DESCRIPTION</div>
					<div class="card-body">
                        <p style="text-align:center;"><?php echo $report['description'];?></p>
					</div>
				</div><hr>
				
			</div>
            <div class="col-sm-6">
			  	<div class="card">
					<div class="card-header" style="text-align:center;">TEST DETAILS</div>
					<div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SNO</th>
                                    <th>TYPE</th>
                                    <th>PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="counterCell"></td>
                                    <td>BLOOD TEST</td>
                                    <td>&#8377 200</td>
                                </tr>
                                <tr>
                                    <td class="counterCell"></td>
                                    <td>SUGER TEST</td>
                                    <td>&#8377 500</td>
                                </tr>
                                <tr>
                                    <td class="counterCell"></td>
                                    <td>URINE TEST</td>
                                    <td>&#8377 400</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>For More Tests, contact to the lab.</p>
					</div>
				</div><hr>
			</div>
            <div class="col-sm-6">
			  	<div class="card">
					<div class="card-header" style="text-align:center;">PATH LAB DETAILS</div>
					<div class="card-body">
                        <p>Phone No. : 7781031768</p>
                        <p>Email : ajaykrdtg5@gmail.com</p>
                        <p>Address : Near Hsr Layout, Bangalore</p>
                        <p>Pincode : 530520</p>
					</div>
				</div><hr>
			</div>
		</div>
        <button type="button" onclick="window.print()" class="btn btn-outline-info btn-block">PRINT</button>
	</div>


</body>
</html>
