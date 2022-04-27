<?php
include 'Connection.php';
if(isset($_POST['add'])){
    $connection = mysqli_connect(host,Username,Password,db);
    if(!$connection)
      die();
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    echo $date;
    $query = "Insert Into Available_Appointment VALUES (0,'".$date."', '".$time."', '".$service."')";
    mysqli_query($connection,$query);
    mysqli_close($connection);
}

?>