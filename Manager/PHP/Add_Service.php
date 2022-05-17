<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
if(isset($_POST['add'])){
    $img = $_FILES['Photo']['tmp_name'];
    $img = addslashes(file_get_contents($img)); 
    $name = $_POST['ServiceName'];
    $query = "SELECT Name FROM Service WHERE Name = '$name'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['Add_Service_Error'] = "Service Exists!";
        exit;
    }
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $query = "Insert into Service VALUES ('".$name."','".$description."', '".$price."', '".$img."');";
    $result = mysqli_query($connection,$query); 
}
mysqli_close($connection);
?>
