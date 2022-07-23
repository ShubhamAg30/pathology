<?php 

require("config.php");
echo  $_GET['id1'];
$id = trim($_GET['id1']);
$query2 = "delete from patients where patient_id = '$id'";
$query = "delete from reports where id = $_GET[id]";
echo $query2;
$query_run1 = mysqli_query($connection,$query2);
$query_run = mysqli_query($connection,$query);

if(!$query_run1){
    echo "true";die;
}
?>

<script type="text/javascript">
	alert("Items Deleted.....");
	window.location.href = "manage_patients.php";
</script>

