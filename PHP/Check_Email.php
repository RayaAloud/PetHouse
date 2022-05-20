<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
 $Email = $_POST['EnteredEmail'];
 $query = "SELECT * FROM pet_owner WHERE Email = '$Email' ";
 $owner_result = mysqli_query($connection,$query);
 $query = "SELECT * FROM Manager WHERE Email = '$Email' ";
 $manager_result = mysqli_query($connection,$query);
 if (mysqli_num_rows($owner_result)>0 || mysqli_num_rows( $manager_result)>0)
 {
    if($_POST['edit'] == 1){
      if($Email == $_SESSION['email']){
          echo 0;
      }
      else{
          echo 1;
      }
    }
    else{
        echo 1;
    }
 }
 else 
     echo 0;
$connection -> close();
?>