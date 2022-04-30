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
$obj;
while($row = mysqli_fetch_array($result)){
    $obj['Date'] = $row['Date'];
    $obj['Time'] = $row['Time'];
    $arr[$i] = $obj;
    $i++;
}
echo json_encode($arr);
?>