<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$apptID = $_POST['appt_ID'];
$rate = $_POST['rate'];
$email = $_SESSION['email'];
$opinion = $_POST['opinion'];
$query = "INSERT INTO REVIEWS VALUES (0, $rate, '$opinion', '$email');";
mysqli_query($connection,$query);
$query = "UPDATE Appointment_Requests SET isReviewed = 1 WHERE Request_ID = $apptID;";
mysqli_query($connection,$query);
$connection -> close();
?>