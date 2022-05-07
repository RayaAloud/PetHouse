<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Styles/ForgotPass.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>   
        <title>Reset Password</title>
        <!--Favicon-->
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Images/favicon_io/favicon-16x16.png">
        <!--Icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/e920294da5.js" crossorigin="anonymous"></script>
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <!--External CSS-->
        <link rel="stylesheet" href="Styles/ForgotPassword.css">
      </head>

    <body>
      <span id="header"></span>
      <img src="Images/Vector.png" id="bcImg1">
      <div class="container d-flex" id="container">
         <div id="EmailBox" class="d-flex flex-column justify-content-between">
         <?php if(isset($_GET['error']))
                    echo "<div class='alert alert-danger' role='alert'>".$_GET['error']."</div>";
          ?>
          <div class="d-flex">
            <form action="PHP/ValidateOTP.php" method="post" class="align-self-center d-flex flex-column" id="form">
              <label for="emailInput" class="mb-4">Enter Your OTP</label><br>
              <input type="text" id="emailInput" placeholder="OTP" name="otp">
              
              <div class="mt-5 col-6 d-flex justify-content-around align-self-center">
                <a href="login.php"><button class="Btns" type="button">Cancel</button></a>
                <input type="submit" value="Send" class="Btns send">
              </div>
            </form>
            <img src="Images/Component 42.png" class="align-self-center" height="150px">
          </div>
         </div>
      </div>
      <img src="Images/PinkPath.png" id="bcImg2">
    </body>
</html>