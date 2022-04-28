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

    $query = "Select * from Service";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($result)){
        echo "<script>";
        echo "document.getElementById('ServicesList').innerHTML += '<div class=\'cards\'>";
        echo "<div class=\'pl-3 pt-3 pr-3\'>";
        echo "<img src=\'data:image/png;charset=utf8;base64,".base64_encode($row[3])."\' width=\'130px\' height=\'130px\'>";
        echo "<p class=\'main-info\'>".$row[0]."</p><p class=\'main-info\'>".$row[2]."</p>";
        echo "</div>";
        echo "<hr>";
        echo "<h5 class=\'collap w-100\'>";
        echo "<i class=\'bi bi-chevron-down\'></i>";
        echo "</h5>";
        echo "<div class=\'content\'>";
        echo "<p class=\'main-info\'>Description</p><p>".$row[1]."</p>";
        echo "</div>";
        echo "</div>'";
        echo "</script>";    
    }
mysqli_close($connection);
?>