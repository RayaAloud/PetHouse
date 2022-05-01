<?php
include 'Connection.php';

$connection = mysqli_connect(host,Username,Password,db);

if(!$connection)
die();

$query = "Select Name from Pet where Owner_Email = 'reem@gmail.com'";//where belong to this owner
$result  = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($result)){
   echo "<script>";
   echo "document.getElementById('petsList').innerHTML +=";
   echo "'<option>".$row['Name']."</option>'";
   echo "</script>";

}
$query = "Select * from Service";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($result)){
        echo "<script>";
        echo "document.getElementById('ServicesList').innerHTML += '<div class=\'cards\'>";
        echo "<div class=\'p-3 pb-0 d-flex flex-column\'>";
        echo "<input type=\'radio\' name=\'service\'>";
        echo "<div class=\'text-center mt-2\'>";
        echo "<img src=\'data:image/png;charset=utf8;base64,".base64_encode($row[3])."\' width=\'100px\' height=\'100px\' class=\'serviceImg\'>";
        echo "<p class=\'main-info\'>".$row[0]."</p><p class=\'main-info\'>".$row[2]." SR</p>";
        echo "</div>";
        echo "</div>";
        echo "<hr>";
        echo "<h5 class=\'text-center collap w-100\'>";
        echo "<i class=\'bi bi-chevron-down\'></i>";
        echo "</h5>";
        echo "<div class=\'content text-wrap\'>";
        echo "<p class=\'main-info\'>Description</p><p>".$row[1]."</p>";
        echo "</div>";
        echo "</div>'";
        echo "</script>"; 
    }

mysqli_close($connection);



?>