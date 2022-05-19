<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$apptID = $_POST['apptID'];
$query = "UPDATE Appointment_Requests SET Status = 'Cancelled' WHERE Request_ID = $apptID;";
$result = mysqli_query($connection,$query);
$query = "SELECT Date, Time, Service_Name FROM Appointment_Requests WHERE Request_ID = $apptID;";
$result = mysqli_query($connection,$query);
if($result){
   $result = mysqli_fetch_array($result);
   $query = "INSERT INTO Available_Appointment VALUES (0, '".$result['Date']."', '".$result['Time']."', '".$result['Service_Name']."')";
   mysqli_query($connection,$query);
}
$connection -> close();
?>