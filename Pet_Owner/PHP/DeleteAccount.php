<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$email = $_SESSION['email'];
$query = "DELETE FROM Pet_Owner WHERE Email = '$email';";
mysqli_query($connection, $query);
mysqli_close($connection);
unset($_SESSION['email']);
session_destroy();
header("Location: ../../index.php");
?>