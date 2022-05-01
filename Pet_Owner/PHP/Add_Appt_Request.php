<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();

$owner_email = 'reem@gmail.com';
$petName = $_POST['petName'];
$petID = '1';
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$note = $_POST['note'];
$query = "insert into Appointment_Requests values (1, '".$owner_email."', ".$petID.", '".$note."', 'Pending');";
mysqli_query($connection,$query);
$connection -> close();

?>