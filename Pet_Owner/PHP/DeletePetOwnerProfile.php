<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();


$query = "DELETE FROM pet_owner";

mysqli_query($connection, $query);
mysqli_close($connection);
header("Location: index.php");
?>