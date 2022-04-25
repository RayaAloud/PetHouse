<?php
include 'Connection.php';

$connection = mysqli_connect(host,Username,Password, db);

if(!$connection)
die();

$query = 'select * from About_Us';
$result = mysqli_query($connection,$query);

$value = mysqli_fetch_array($result);
    echo "<script>
    var description = document.getElementById('AboutUsText');
    description.innerHTML = '<p>".$value[1]."</p>';";
    echo "document.getElementById('location').innerHTML = '".$value[2]."'</script>";
    echo "\n<script>document.getElementById('about-us-img').src ='data:image/png;charset=utf8;base64,".base64_encode($value[3])."'</script>";
?>