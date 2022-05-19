<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$appt_ID = $_POST['appt_ID'];
$time = $_POST['time'];
$date = $_POST['date'];
$service = $_POST['service'];
$pet = $_POST['petID'];
$note = $_POST['note'];
$query = "UPDATE Appointment_Requests SET Time = '$time', Date = '$date', Service_Name = '$service', petID = $pet, Note = '$note' WHERE Request_ID = $appt_ID;";
$result = mysqli_query($connection, $query);
$connection -> close();
?>