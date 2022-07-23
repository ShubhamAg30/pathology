<?php
	session_start();
	require('config.php');


	function get_user_count(){
		require('config.php');
		$user_count = "";
		$query = "select count(*) as user_count from users";
		$query_run = $connection->query($query);
		while($row = $query_run->fetch_assoc()){
			$user_count = $row['user_count'];
		}
		return($user_count);
	}

	function get_issued_report_count(){
		
		require('config.php');
		$issued_reports_count = "";
		$query = "select count(*) as issued_reports from reports where status = 1 ";
		$query_run = $connection->query($query);
		while($row = $query_run->fetch_assoc()){
			$issued_reports_count = $row['issued_reports'];
		}
		return($issued_reports_count);
	}
	function get_patient_count(){
		require('config.php');
		$patient_count = 0;
		$query = "select count(*) as patient_count from patients";
		$query_run = $connection->query($query);
		while($row = $query_run->fetch_assoc()){
			$patient_count = $row['patient_count'];
		}
		return($patient_count + 1);
	}
	function get_patient_count_value(){
		require('config.php');
		$patient_count = 0;
		$query = "select count(*) as patient_count from patients";
		$query_run = $connection->query($query);
		while($row = $query_run->fetch_assoc()){
			$patient_count = $row['patient_count'];
		}
		return($patient_count);
	}
	
	

?>