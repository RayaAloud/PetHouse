<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();

$serviceName = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$apptID = $_POST['ApptId'];
$query = "UPDATE Available_Appointment Set Date = '".$date."', Time = '".$time."', Service_Name = '".$serviceName."' Where Appointment_ID =".$apptID.";";
mysqli_query($connection,$query);
echo "Appointment Updated Successfully";
mysqli_close($connection);

?>