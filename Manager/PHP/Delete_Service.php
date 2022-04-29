<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$service_name = $_POST['ServiceName'];
$query = "Delete FROM Service Where Name = '".$service_name."'";
$result  = mysqli_query($connection,$query);
mysqli_close($connection);
?>