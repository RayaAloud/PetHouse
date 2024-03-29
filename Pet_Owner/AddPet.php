<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../index.php");
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--External CSS-->
        <link rel="stylesheet" href="Styles/AddPet.css">
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>   
        <title>Add New Pet</title>
        <!--Icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <!--Favicon-->
        <link rel="icon" type="/image/x-icon" href="../images/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
        <link rel="manifest" href="../Images/favicon_io/site.webmanifest">
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      </head>
    <!--Scripts-->
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
     showPage('Signed_In_Header.php','header')
   })
  </script>
    <body>
      <span id="header"></span>
      <img src="../Images/Vector.png" id="bcImg1">
      <div class="container d-flex justify-content-center p-5" id="Container">
        <div id="box">
          <div class="container d-flex justify-content-between align-items-center flex-column-reverse flex-md-row">
            <form method="post" action="#" class="col-6">
                <label for="petname">Pet Name</label> <br>
                  <input type="text" name="petname" id="aPetname">

                <label for="birthDate">Date of birth</label> <br>
                  <input type="date" name="birthDate" id="abirthDate">
                 
                <label for="petgender">Gender</label>
                  <select name="petgender" id="pet-gender">
                      <option >Male</option>
                      <option>Female</option>
                  </select>

                <label for="petbreed">Breed</label>
                  <input type="text" name="petbreed">
                <label for="petstatus">Status</label>
                  <input type="text" name="petstatus">

                <label for="vaccinatiom">Vaccinatiom List <p class="p-to-Line">(optional)</p></label> <!-- <input type="file"> عشان احط الفايل -->
                  <textarea name="vaccinatiom" id="text-vaccinatiom" cols="30" rows="5"> </textarea>

                <label for="medicalHistory">Medical History<p class="p-to-Line">(optional)</p></label>
                  <textarea name="medicalHistory" id="medical-History" cols="30" rows="10"></textarea>     
            </form>
             <div id="addinPic" class="d-flex flex-column">
                <img id="pet-image" src="../images/catPurple.png" alt="pet picture">
                <input type="file" id="uploadFile">
                <label class="align-self-end" for="uploadFile"><i class="bi bi-plus-circle-fill" id="plusS"></i></label>
             </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
              <div class="col-4 d-flex justify-content-around">
                <a href="MyPets.php"><button class="btns">Cancel</button></a>
                <button class="btns">Add</button>
              </div>
           </div>
        </div>
      </div>
      <img src="../Images/PinkPath.png" id="bcImg2">
    </body>
    <script>
      $('#uploadFile').change(function(){ 
            document.getElementById('pet-image').src = window.URL.createObjectURL(this.files[0]);
      })
    </script>
</html>