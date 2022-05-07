<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
echo "Hi";

$connection -> close();


?>