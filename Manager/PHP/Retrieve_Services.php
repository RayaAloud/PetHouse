<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
  if(!$connection)
   die();
$query = "Select * from Service";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($result)){
    echo "<script>";
    echo "document.getElementById('ServicesList').innerHTML += '<div class=\'cards\'>";
    echo "<div class=\'pl-3 pt-3 pr-3\'>";
    echo "<div class=\'mb-2\'>";
    echo "<i class=\'bi bi-pencil-square edit\' onclick=\'show(this)\'></i>";
    echo "<i class=\'bi bi-trash3 garbage DeleteBtn\'></i>";
    echo "</div>";
    echo "<img src=\'data:image/png;charset=utf8;base64,".base64_encode($row[3])."\' width=\'130px\' height=\'130px\' class=\'ServiceImg\'>";
    echo "<p class=\'main-info\'>".$row[0]."</p><p class=\'main-info\'>".$row[2]." SR</p>";
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