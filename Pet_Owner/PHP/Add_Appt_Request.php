<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$avApptID = $_POST['avApptID'];
$petID = $_POST['petID'];
$time = $_POST['time'];
$date = $_POST['date'];
$note = $_POST['note'];
$service_name = $_POST['service_name'];
$query = "INSERT INTO Appointment_Requests VALUES (0, '$time', '$date', '$service_name', $petID, 'Pending', '$note', 0);";
$result = mysqli_query($connection,$query);
$query = "DELETE FROM Available_Appointment WHERE Appointment_ID = '$avApptID'; ";
$result = mysqli_query($connection,$query);
if($result)
print(1);
$connection -> close();
?>