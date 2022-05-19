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
            showPage('Signed_In_Header.php', 'header');
        })
  
   </script>
</head>

<body>
<span id="header"></span>
  <img src="../Images/designer_1.png" id="bcBluePath">
  <div class="container-fluid d-flex mt-5 justify-content-center">
<div class="wrapper bg-white mt-sm-5 col-sm-10">
    <form method="post">
     <div class="container-fluid d-flex justify-content-center">
       <?php
            if($ProfilePhoto == null) {
                echo "<div id='profile-pic-div' class='d-flex flex-column align-items-center'> 
                <img src='../Images/undraw_profile_pic_ic.png' id='photo' alt='profile image'> 
                <input type='file' id='file'>
                <label for='file' id='uploadBtn'>Choose Photo</label>
                </div>";
            }
            else {
                echo "<div id='profile-pic-div' class='d-flex flex-column align-items-center'> 
                <img src='data:image/png;charset=utf8;base64,".base64_encode($ProfilePhoto)."' id='photo' alt='profile image'>  
                <input type='file' id='file'>
                <label for='file' id='uploadBtn'>Choose Photo</label>
                </div>";
            }
          }
        }
       ?>
       
    </div>
<div class="container mt-5">
    <div class = "row py-2 mt-3"> 
            <div class="col-md-6"> <label for="firstname"> First Name </label> <input name ="First_Name" type="text" class="bg-light form-control" placeholder = "First name" value="<?php echo $Fname;?>" required> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="lastname"> Last Name </label> <input name ="Last_Name" type="text" class="bg-light form-control" placeholder = "Last name" value="<?php echo $Lname;?>" required> </div>
    </div>
        
        <div class="row py-2"> 
            <div class="col-md-6"> <label for="email"> Email Address </label> <input type="text" class="bg-light form-control" placeholder = "Email address" value="<?php echo $Email; ?>" required> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="phonenumber"> Phone Number </label> <input name = "PhoneNo" type="text" class="bg-light form-control" placeholder = "Phone number" value="<?php echo $PhoneNo; ?>" required> </div>
        </div>
        

        <div class="row py-2">
            <div class="col-md-6"> <label for="gender"> Gender </label> <select name = "gender" id="gender" class="bg-light"> 
                <option value = "hid" hidden> <?php echo $Gender; ?> </option>
                <option value = "male"> Male </option>
                <option value="female" selected> Female </option> 
            </select> </div>
        </div>
    </div>   
        <div class="m-auto col-6 py-3 pb-4 d-flex justify-content-around mt-3">
          <button class="py-2 px-3" id="saveBtn" name="save">Save Changes</button>  
          <a href = "PHP/DeletePetOwnerProfile.php?id =<?php echo $_SESSION['Email']; ?>"> <button type="button" class="btn btn-outline-danger" id="delAccountBtn">Delete Account</button></div> </a>
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
    </script>
</html>

<?php
if (isset($_POST['save'])) {
    $Fname = $_POST['First_Name'];
    $Lname = $_POST['Last_Name'];
    $PhoneNo = $_POST['PhoneNo'];
    $OwnerEmail = $_SESSION["Email"];
    if($_POST['Profile_Photo']['size'] > 0){
      $ProfilePhoto = $_POST['Profile_Photo']['tmp_name'];
      $query = "UPDATE Pet_Owner SET First_Name = '".$Fname."', Last_Name = '".$Lname."', PhoneNo = '".$PhoneNo."', Profile_Photo ='".$ProfilePhoto."' WHERE Email = '$OwnerEmail'";
    }
    else{
        $query = "UPDATE Pet_Owner SET First_Name = '".$Fname."', Last_Name = '".$Lname."', PhoneNo = ".$PhoneNo."  WHERE Email = '$OwnerEmail'";
    }

    $result = mysqli_query($connection, $query);

    if(!$result)
    echo "<script>alert('an error occurred, could not change profile.')</script>"; 

}

?>


