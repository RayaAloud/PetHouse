<?php
session_start();
$email = $_SESSION['email_reset_pass'];
$pass = $_POST['newPass'];

  include 'Connection.php';
  $con = mysqli_connect(host,Username,Password,db);
  $query = "SELECT * FROM Pet_Owner WHERE Email = '$email';";
  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result) > 0){
    $query = "UPDATE Pet_Owner SET Password = '$pass' WHERE Email = '$email';";
    $result = mysqli_query($con,$query);
    if($result){
      echo 1;
    }
    else{
      echo 2;
    }
  }
  else{
    $query = "SELECT * FROM Manager WHERE Email = '$email';";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
      $query = "UPDATE Manager SET Password = '$pass' WHERE Email = '$email';";
      $result = mysqli_query($con,$query);
      if($result){
        echo 1;
      }
      else{
        echo 2;
      }
    }
  }
session_unset();
session_destroy();
?>