<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
setcookie('service_old_name', "", time() + (86400 * 30));
if(isset($_POST['name']) && isset($_POST['oldName']) && isset($_POST['price']) && isset($_POST['description'])){
    $service_new_name = $_POST['name'];
    $service_old_name = $_POST['oldName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    setcookie('service_old_name', $service_old_name, time() + (86400 * 30),  "/");
    print_r($_POST);
    print_r($_FILES);
    $query = "Update Service 
            Set Name = '".$service_new_name."', Description ='".$description."', Price = '".$price."'"
            ." Where Name = '".$service_old_name."';";
    $result  = mysqli_query($connection,$query);
}
if(isset($_FILES['img']['tmp_name'])){
    $service_old_name = $_COOKIE['service_old_name'];
    $img = $_FILES['img']['tmp_name'];
    $img = addslashes(file_get_contents($img));
    $query = "Update Service Set Photo = '".$img."' Where Name = '".$service_old_name."';";
    $result  = mysqli_query($connection,$query);
    setcookie('service_old_name', "", time() - (86400 * 30),  "/");
}
mysqli_close($connection);
?>