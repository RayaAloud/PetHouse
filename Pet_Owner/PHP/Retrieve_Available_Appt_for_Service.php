<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$service = $_POST['serviceName'];
$query = "Select Appointment_ID, Date, Time from Available_Appointment Where Service_Name = '".$service."'";
$result = mysqli_query($connection,$query);
$i = 0;
$arr;
$obj;
if(mysqli_num_rows($result) == 0){
    echo 0;
    exit;
}
while($row = mysqli_fetch_array($result)){
    $obj['Appt_ID'] = $row['Appointment_ID'];
    $obj['Date'] = $row['Date'];
    $obj['Time'] = $row['Time'];
    $arr[$i] = $obj;
    $i++;
}
echo json_encode($arr);
$connection -> close();
?>