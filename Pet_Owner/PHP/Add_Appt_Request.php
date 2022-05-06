<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$apptID = $_POST['ApptID'];
$owner_email = 'reem@gmail.com';
$petID = '1';
$note = $_POST['note'];
$query = "insert into Appointment_Requests values ($apptID, '".$owner_email."', ".$petID.", '".$note."', 'Pending');";
$result = mysqli_query($connection,$query);
if($result)
print(1);
$connection -> close();

?>