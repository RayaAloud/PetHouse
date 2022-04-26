<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
if(isset($_POST['add'])){
    $img = $_FILES['Photo']['tmp_name'];
    $img = addslashes(file_get_contents($img)); 
    $name = $_POST['ServiceName'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $query = "Insert into Service VALUES ('".$name."','".$description."', '".$price."', '".$img."');";
    $result = mysqli_query($connection,$query);
    //header('Location: ../sideMenu.html');  
}
mysqli_close($connection);
?>