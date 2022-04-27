<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$query = "Select Name from Service";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($result)){
    echo "<script>";
    echo "document.getElementById('serviceOptions').innerHTML +=";
    echo "'<option value=\'".$row['Name']."\'>".$row['Name']."</option>'";
    echo "</script>";
}
mysqli_close($connection);
?>