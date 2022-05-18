<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();

$query = "DELETE FROM Pet_Owner WHERE Email = '".$_SESSION['email']."';";

mysqli_query($connection, $query);
mysqli_close($connection);
session_unset($_SESSION['email']);
session_destroy();
header("Location: index.php");
?>