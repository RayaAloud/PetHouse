<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../index.php");
}
include 'PHP/Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection) {
    die('error in database'.mysqli_error($connection));
}
else {
    $email = $_SESSION['email'];

    $query = "SELECT * FROM pet_owner WHERE Email = '$email'";
    $result = mysqli_query($connection,$query);

    if (!empty($result -> num_rows) && ($result ->num_rows > 0)) {
        while ($row = $result -> fetch_assoc()){
            $Fname = $row['First_Name'];
            $Lname = $row['Last_Name'];
            $Email = $row['Email'];
            $PhoneNo = $row['PhoneNo'];
            $Gender = $row['Gender'];
            $ProfilePhoto = $row['Profile_Photo'];
    }
        
    $connection -> close();
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
    <script src="../JS/Validations.js"></script>
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
            showPage('Signed_In_Header.php', 'header');
        })
  
   </script>
</head>

<body>
<div id="darkBcground"></div>
<span id="header"></span>
  <img src="../Images/designer_1.png" id="bcBluePath">
  <div id="delete-confirmation">
      <div id="content-container" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeMsg()">X</button>
        <h3 class="mb-5">Delete Account?</h3>
        <div id="btns-container">
            <button id="cancelButton">No</button>
            <button class="confirm-action-Button" id="delete-acc-btn">Yes</button>
        </div>
      </div>
    </div>
  <div class="container-fluid d-flex mt-5 justify-content-center">
<div class="wrapper bg-white mt-sm-5 col-sm-10">
 <div class='alert alert-danger' role='alert' id="error_alert" style="display: none"></div>
 <div class="alert alert-success" id="success_alert" role="alert" style="display: none"></div>
 <iframe id="iframe" name="my_iframe"></iframe>
    <form method="post" id="profile_form" action="PHP/Edit_Profile.php" enctype="multipart/form-data">
     <div class="container-fluid d-flex justify-content-center">
       <?php
            if($ProfilePhoto == null) {
                echo "<div id='profile-pic-div' class='d-flex flex-column align-items-center'> 
                <img src='../Images/undraw_profile_pic_ic.png' id='photo' alt='profile image'> 
                <input type='file' id='file' name='profile_photo'>
                <label for='file' id='uploadBtn'>Choose Photo</label>
                </div>";
            }
            else {
                echo "<div id='profile-pic-div' class='d-flex flex-column align-items-center'> 
                <img src='data:image/png;charset=utf8;base64,".base64_encode($ProfilePhoto)."' id='photo' alt='profile image'>  
                <input type='file' id='file' name='profile_photo'>
                <label for='file' id='uploadBtn'>Choose Photo</label>
                </div>";
            }
          }
        }
       ?>
       
    </div>
<div class="container mt-5">
    <div class = "row py-2 mt-3"> 
            <div class="col-md-6"> <label for="firstname"> First Name </label> <input name ="First_Name" type="text" class="bg-light form-control" placeholder = "First name" value="<?php echo $Fname;?>" required id="fname"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname"> Last Name </label> <input name ="Last_Name" type="text" class="bg-light form-control" placeholder = "Last name" value="<?php echo $Lname;?>" required id="lname"> </div>
    </div>
        
        <div class="row py-2"> 
            <div class="col-md-6"> <label for="email"> Email Address </label> <input type="text" name = "email" class="bg-light form-control" placeholder = "Email address" value="<?php echo $Email; ?>" required id="email"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="phonenumber"> Phone Number </label> <input name = "PhoneNo" type="text" class="bg-light form-control" placeholder = "Phone number" value="<?php echo $PhoneNo; ?>" required id="phone"> </div>
        </div>
        

        <div class="row py-2">
            <div class="col-md-6"> <label for="gender"> Gender </label> <select name = "gender" id="gender" class="bg-light"> 
                <?php
                if($Gender == "female")
                echo " <option value = 'male'> male </option>
                <option value='female' selected> female </option>";
                if($Gender == "male")
                echo " <option value = 'male' selected> male </option>
                <option value='female'> female </option>";
                ?>
            </select> </div>
        </div>
    </div>   
        <div class="m-auto col-6 py-3 pb-4 d-flex justify-content-around mt-3">
          <button class="py-2 px-3" name ="save" id="saveBtn">Save Changes</button>  
          <button type="button" class="btn btn-outline-danger" id="delAccountBtn">Delete Account</button>
        </div> 
    </div>
  </div>
  <form>
 </div>

    <div>
        <img src="../Images/undraw_playful_cat_re_ac9g.png" alt="cat" class="img_background" id="bcimg">
    </div>

 </body>
    <script>
        $('#file').change(function(){ 
            document.getElementById('photo').src = window.URL.createObjectURL(this.files[0]);
        })
   
        $('#profile_form').submit(function(e){
            $('#error_alert').html("");
            $('#error_alert').css('display', 'none');
            $('#success_alert').html("");
            $('#success_alert').css('display', 'none');
            $.ajax({
                url: '../PHP/Check_Email.php',
                method: 'POST',
                async: false,
                data: {EnteredEmail : $('#email').val(), edit : 1}
            }).done(function(msg){
                if(msg == 0)
                    sessionStorage.setItem('email_exists', 0);
                else if(msg == 1){
                    sessionStorage.setItem('email_exists', 1);
                }
            })
            var emailExists = sessionStorage.getItem('email_exists');
            var thereIsError = false;
            if(emailExists == 1)
                document.getElementById('error_alert').innerHTML += '&#9679; Email Exists!<br>';
            if(!validPhone($('#phone').val(),1)){
                document.getElementById('error_alert').innerHTML += '&#9679; Invalid Phone! Phone number must be 10 digits and should start with 05<br>'; 
                thereIsError = true;
            }
            if(!validEmail($('#email').val())){
                document.getElementById('error_alert').innerHTML += '&#9679; Invalid Email Address!<br>'; 
                thereIsError = true;
            }
            if(!validFirstName($('#fname').val())){
                document.getElementById('error_alert').innerHTML += '&#9679; First name should be maximum 30, and should not contain special characters or digits<br>'; 
                thereIsError = true;
            }
            if(!validLastName($('#lname').val())){
                document.getElementById('error_alert').innerHTML += '&#9679; Last name should be at least 1 letters and maximum 30, and should not contain special characters or digits<br>'; 
                thereIsError = true;
            }
            if((emailExists == 1) || (thereIsError === true)){
                e.preventDefault();
                $('#sign_up_form').attr('target','my_iframe')
                $('#error_alert').css('display', 'block');
            }
            else{
                $('#profile_form').attr('target','my_iframe')
                $('#success_alert').html('Profile updated Successfully');
                $('#success_alert').css('display', 'block');
            }
                
        })
        function closeMsg(){
         $("#delete-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
        }
        $('#cancelButton').click(function(){
          closeMsg();
        })
        $('#delAccountBtn').click(function(){
            $("#delete-confirmation").css('display','block'); 
            $('#darkBcground').css('display','block');
        })
        $('#delete-acc-btn').click(function(){
        $.ajax({
            url: 'PHP/DeleteAccount.php',
            method: 'POST',
            }).done(function(msg){
                window.location.href = "../index.php";
                closeMsg();
            })
       })
    </script>
</html>
