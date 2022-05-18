<!DOCTYPE html>
 
<html>
 <head>

    <meta charset="utf-8">
    <title>Sign up</title> 
    <!--Favicons-->
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="Images/favicon_io/site.webmanifest">
    <!--External CSS-->
    <link rel="stylesheet" href="Styles/Style_signup.css">
    <!--Icons-->
    <script src="https://kit.fontawesome.com/508ef41e7b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--Bootstrap-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
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
    <div id="container" class="mt-5">
    <div id="box" class="d-flex m-auto">
            
            <div id="top" class="col-4 d-flex flex-column">
              <div>
                 <h3>Welcome to PetHouse!</h3>
                 <p class="fs-5">Sign up to continue</p>
              </div>
              <img src="Images/Park_Picture.png" id="smallImg">
            </div>
            
            
             <div id="inputs" class="d-flex flex-column col-8">
             <?php if(isset($_GET['error']))
                    echo "<div class='alert alert-danger' role='alert'>".$_GET['error']."</div>";
             ?>
               <form class="d-flex flex-column" action="PHP/Sign_up.php" method="post" enctype="multipart/form-data"> 
                <div id="addinPic" class="d-flex flex-column align-self-center mt-4">
                    <img id="profile-image" src="images/undraw_profile_pic_ic.png" alt="pet picture">
                    <input type="file" id="uploadFile" name="profile-img">
                    <label class="align-self-end" for="uploadFile"><i class="bi bi-plus-circle-fill" id="plusS"></i></label>
                 </div>
                    <div class="d-flex justify-content-between mb-2">
                        <label>
                            First Name <br>
                            <input name="fname" type="text"  placeholder="Enter first name" required>
                            
                        </label>
                        <label>
                            Last Name <br>
                            <input name="lname" type="text" placeholder="Enter last name" required>
                            
                        </label>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <label>
                            Email <br>
                            <input name="email" type="email"  placeholder="Enter email" required>
                            
                        </label>
                        <label>
                            Password <br>
                            <input name="password" type="password" placeholder="Enter your password" required>
                            
                        </label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label>
                            Phone Number <br>
                            <input name="phone" type="tel" placeholder="Enter your phone number" required>
                        </label>
                        <label class="col-3">
                            <span>Gender</span>
                            <br>
                            <input class="mt-3" name="gender" type="radio" value="male">
                            <span>male</span>
                            <input class="mt-3" name="gender" type="radio" value="female">
                            <span>female</span>       
                        </label>
                        </label>
                       <label>
                    </div>
                   
                    <button type="submit" id="signInBtn2" name="signup-submit" class="align-self-center mt-5">Sign up</button>   
                </form> 
                <div id="toSignup" class="m-auto mt-4">
                    <p>Already have an account? <a href="login.php">Sign in</a></p>
                </div>
            </div>
       </div>
    </div>
    <div id="images">
        <img id="background" src="Images/Vector.png" alt="background image"> 
    </div>  
  </body>
  <script>
    $('#uploadFile').change(function(){ 
        document.getElementById('profile-image').src = window.URL.createObjectURL(this.files[0]);
    })
</script>
</html>