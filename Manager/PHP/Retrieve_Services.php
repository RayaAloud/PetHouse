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
    echo "<div>";
    echo "<i class=\'bi bi-pencil-square edit\' onclick=\'show()\'></i>";
    echo "<i class=\'bi bi-trash3 garbage\'></i>";
    echo "</div>";
    echo "<img src=\'../Images/Component40.png\' width=\'130px\' height=\'130px\'>";
    echo "<p class=\'main-info\'>Checkup</p><p class=\'main-info\'>180SR</p>";
    echo "</div>";
    echo "<hr>";
    echo "<h5 class=\'collap w-100\'>";
    echo "<i class=\'bi bi-chevron-down\'></i>";
    echo "</h5>";
    echo "<div class=\'content\'>";
    echo "<p class=\'main-info\'>Description</p><p>content</p>";
    echo "</div>";
    echo "</div>'";
    echo "</script>";    
}
mysqli_close($connection);
?>