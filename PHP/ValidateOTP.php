<?php
session_start();
$otp = $_SESSION['otp'];
$enteredOTP = $_POST['otp'];
if($otp == $enteredOTP){
  header("Location: ../Reset_Password.html");
}
else{
  header("Location: ../OTP.html?error=Wrong OTP!");
}
?>