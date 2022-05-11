<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();



$Email = $_SESSION["Email"];


$query = "SELECT * FROM pet_owner WHERE Email = '$Email';";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);

echo $row['First_Name'];
echo $row['Last_Name'];
echo $row['PhoneNo'];
echo $row['Gender'];
echo base64_encode ($row['Profile_Photo']);


$connection -> close();
?>