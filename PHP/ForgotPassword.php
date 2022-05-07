<?php
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if(isset($_POST['email'])){
  include 'Connection.php';
  $email = $_POST['email'];
  $con = mysqli_connect(host,Username,Password,db);
  $query = "SELECT * FROM Pet_Owner WHERE Email = '$email';";
  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result) > 0){
       $otp_num = sendMail($email);
       $_SESSION['otp'] = md5($otp_num);
       $_SESSION['email_reset_pass'] = $email;
       header("Location: ../OTP.php");      
  }
  else{
    $query= "SELECT * FROM Manager WHERE Email = '$email';";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        sendMail($email);
       
    }
    else{
        header("Location: ../ForgotPassword.html?error=Email not exists!");
    }
  }  
}
function sendMail($userEmail){
 //Create an instance; passing `true` enables exceptions
 $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'PetHouse.coo@gmail.com';                     //SMTP username
        $mail->Password   = 'Pethouse123';                               //SMTP password
        $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';           //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('PetHouse.coo@gmail.com', 'PetHouse');
        $mail->addAddress($userEmail);     //Add a recipient

        //Generate random otp number
        $otp = random_int(1000, 9999);
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'OTP';
        $mail->Body    = 'Here is your secure code '.$otp.' <br><br> PetHouse Glad That You Are Part of It';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    return $otp;
}
?>
