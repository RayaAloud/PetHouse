<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$service_Name = $_POST['service_name'];
$query = "SELECT * FROM Service WHERE Name = '$service_Name';";
if(mysqli_query($connection,$query) -> num_rows > 0)
echo 1;
else 
echo 0;
$connection -> close();
?>