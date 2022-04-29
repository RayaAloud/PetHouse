<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);

if(!$connection)
die();
$service = $_POST['serviceName'];
$query = "Select Date, Time from Available_Appointment Where Service_Name = '".$service."'";
$result = mysqli_query($connection,$query);
$i = 0;
$arr;
while($row = mysqli_fetch_array($result)){
    $arr[$i] = $row;
    $i++;
}
echo json_encode($arr);


?>