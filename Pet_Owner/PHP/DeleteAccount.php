<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$email = $_POST['Email'];
$query = "DELETE FROM pet_owner WHERE Email = $email;";
mysqli_query($connection, $query);
mysqli_close($connection);
?>