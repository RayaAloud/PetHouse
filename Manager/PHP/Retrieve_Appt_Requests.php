<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$query = "Select * from Appointment_Requests where Status = 'Pending'";

$connection -> close();


?>