<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();

$serviceName = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$query = "update Available_Appointment Set Date = '".$date."', Time = '".$time."', Service_Name = '".$serviceName."' Where Appointment_ID =".$_SESSION['Appointment_ID_to_be_Edited'].";";
mysqli_query($connection,$query);
echo "Appointment Updated Successfully";
mysqli_close($connection);

?>