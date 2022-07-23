
<?php
// $connection = mysqli_connect("localhost","root","", "pathology");

// if(!$connection)
// {
//   echo"connection error";
//   echo"please check manually!";  
// }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?>