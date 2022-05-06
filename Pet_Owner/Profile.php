<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../index.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
    <!--External CSS-->
    <link rel="stylesheet" href="Styles/Profile.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
            showPage('Signed_In_Header.html', 'header');
        })
  
   </script>
</head>

<body>
<span id="header"></span>
  <img src="../Images/designer_1.png" id="bcBluePath">
  <div class="container-fluid d-flex mt-5 justify-content-center">
<div class="wrapper bg-white mt-sm-5 col-sm-10">
     <div class="container-fluid d-flex justify-content-center">
         <div id="profile-pic-div" class="d-flex flex-column align-items-center"> 
             <img src="../Images/undraw_profile_pic_ic.png" id="photo" alt="profile image"> 
             <input type="file" id="file">
             <label for="file" id="uploadBtn">Choose Photo</label>
        </div>
    </div>
<div class="container mt-5">
    <div class = "row py-2 mt-3"> 
            <div class="col-md-6"> <label for="firstname"> First Name </label> <input type="text" class="bg-light form-control" value="Raya"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname"> Last Name </label> <input type="text" class="bg-light form-control" value="Aloud"> </div>
    </div>
        
        <div class="row py-2"> 
            <div class="col-md-6"> <label for="email"> Email Address </label> <input type="text" class="bg-light form-control" value="rayaali@gmail.com"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="phonenumber"> Phone Number </label> <input type="text" class="bg-light form-control" value="+966 53-888-1823"> </div>
        </div>
        

        <div class="row py-2">
            <div class="col-md-6"> <label for="gender"> Gender </label> <select name = "gender" id="gender" class="bg-light"> 
                <option value = "male"> Male </option>
                <option value="female" selected> Female </option> 
            </select> </div>
        </div>
    </div>   
        <div class="m-auto col-6 py-3 pb-4 d-flex justify-content-around mt-3">
          <button class="py-2 px-3" id="saveBtn">Save Changes</button>  
          <button type="button" class="btn btn-outline-danger" id="delAccountBtn">Delete Account</button></div>
        </div> 
    </div>
  </div>
 </div>

    <div>
        <img src="../Images/undraw_playful_cat_re_ac9g.png" alt="cat" class="img_background" id="bcimg">
    </div>

 </body>
    <script>
        $('#file').change(function(){ 
            document.getElementById('photo').src = window.URL.createObjectURL(this.files[0]);
        })
    </script>
</html>