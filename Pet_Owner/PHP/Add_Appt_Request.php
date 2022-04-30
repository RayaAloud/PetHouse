<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();

$pet = $_POST['petName'];
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$query;
print_r($_POST);

$connection -> close();

?>