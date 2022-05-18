<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$apptID = $_POST['apptID'];
$status = $_POST['status'];
$query = "UPDATE Appointment_Requests SET Status = '$status' WHERE Request_ID = $apptID;";
mysqli_query($connection,$query);
$connection -> close();
?>