<!DOCTYPE html>
<?php 
    session_start();
    
    // Check if the user has already logged in
    if(isset($_SESSION['email']))
        // header() is used to send a raw HTTP header. It must be called before any actual output is sent.
        header("Location: Pet_Owner/Dashboard.php");

    else
    {}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title> 
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Images/favicon_io/favicon-16x16.png">
    <!--External CSS-->
    <link rel="stylesheet" href="Styles/loginStyle.css">
    <!--Icons-->
    <script src="https://kit.fontawesome.com/508ef41e7b.js" crossorigin="anonymous"></script>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <style>
        #signInBtn{
            display: none;
        }
    </style>
    <script>
        function makeRequest(){
            var req;
            if(window.XMLHttpRequest)
              req = new XMLHttpRequest();
            else{
                req = new ActiveXObject(Microsoft.XMLHttpRequest);
            }
            return req;
        }
  
        function showPage(page, elem){
            var request = makeRequest();
            
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status)
                $("#"+elem).html(request.responseText);
            }
  
            request.open("Get", page, true);
            request.send();
        }
  
      $(document).ready(function(){
        showPage('Unsigned_In_Header.html', 'header');
      })
  </script>
  
  
</head>
    <body>
        <span id="header"></span>
    <div id="container">
        <img class="leftimg" src="Images/undraw_sign_in.png" alt="Login image">
        <img class="leftbackground" src="Images/Path.png" alt="background image"> 


    <div id="box">
            
             <div id="top">
                 <div>
               <h4>Welcome Back!</h4>
               <p>Sign in to continue</p>
            </div>
               <img src="Images/undraw_my_password_.svg" id="smallImg">
            </div>
            
            <form class="form-signin" action="PHP/Login.php" method="post">
                <?php if(isset($_GET['error']))
                    echo "<div class='alert alert-danger' role='alert'>".$_GET['error']."</div>";
                ?>
                 <div id="inputs">
                    <p>
                        <label>
                            Email <br>
                            <input name="email" type="email"  placeholder="Enter your email" required>
                            
                        </label>
                    </p>
                    <p>
                        <label>
                            Password <br>
                            <input name="password" type="password" placeholder="Enter your password" required>
                        </label>
                    </p>
                 </div>
                 <a class="text-decoration-none" href="Dashboard.html"><button type="submit" id="signInBtn2">Sign in</button></a>
            </form>  
            <p id="forgetpass"><i class="fa-solid fa-lock"></i><a href="ForgotPassword.html" id="forgotPass">Forgot your password?</a></p>
             
             
       
       <div id="toSignup">
           <p>Don’t have an account? <a href="signup.php">Sign up now</a></p>
       </div>
    </div>
    </div>
    </body>
</html>
