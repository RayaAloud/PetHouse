<?php
session_start();
$otp = $_SESSION['otp'];
$enteredOTP = $_POST['otp'];
if($otp == md5($enteredOTP)){
  header("Location: ../Reset_Password.html");
}
else{
  header("Location: ../OTP.php?error=Wrong OTP!");
}
?>