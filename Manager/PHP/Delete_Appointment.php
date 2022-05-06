<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$apptID = $_POST['ApptID'];
$query = "DELETE FROM Available_Appointment WHERE Appointment_ID = $apptID;";
mysqli_query($connection, $query);
?>