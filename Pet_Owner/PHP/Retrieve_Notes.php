<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$appointment_ID = $_POST['Appt_ID'];
$query = "SELECT Note FROM Appointment_Requests WHERE Appointment_ID = $appointment_ID";
$row = mysqli_fetch_array(mysqli_query($connection,$query));
echo $row['Note'];

?>