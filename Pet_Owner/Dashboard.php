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
    <title>Dashboard</title>
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
    <!--External CSS-->
    <link rel="stylesheet" href="Styles/Dashboard.css">
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
    <!--Bootsrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="Note.js"></script>
   
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
    <img src="../Images/Vector.png" id="bcImg">
    <div id="divv2">
      <div id="divCont2" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeNote()">X</button>
        <h3>Note</h3>
        <p id="note"></p>
      </div>
    </div>
   <div class="container py-4 d-flex flex-column mt-5"> 
   <div class="d-flex flex-column flex-lg-row">
     <a class="col-4 text-decoration-none sections" href="Request_Appointment.php">
        <div class="cards d-flex" style="width: 360px; height: 170px;">
          <div class="rectangle"></div> 
          <div class="container d-flex align-items-center flex-column mt-4">
            <img src="../Images/box_icon.png"  width="75px" height="75px">
            <span class="container text-center text-decoration-none mt-3">
                <p>Request Appointment</p>  
            </span>
          </div>
        </div> 
      </a>
      <a class="col-4 text-decoration-none sections" href="PreviousAppointments.php">
        <div class="cards d-flex" style="width: 360px; height: 170px;">
            <div class="rectangle"></div> 
            <div class="container d-flex align-items-center flex-column mt-4">
              <img src="../Images/mdi_page-previous-outline.png" width="80px" height="80px">
              <span class="container text-center text-decoration-none mt-3">
                  <p>Previous Appointments</p>  
              </span>
            </div>
        </div>  
       </a>
       <a class="col-4 text-decoration-none sections" href="MyPets.php">
          <div class="cards d-flex" style="width: 360px; height: 170px;">
            <div class="rectangle"></div> 
            <div class="container d-flex align-items-center flex-column mt-4">
              <img src="../Images/icons8_cat-footprint.png"  width="100px" height="95px">
              <span class="container text-center text-decoration-none mt-1">
                  <p id="myPets">My Pets</p>  
              </span>
            </div>
        </div>
        </a>
    
      </div>
      <div class="mt-5">
        <a  class="col-4 text-decoration-none sections" href="AppointmentRequests.php">
          <div class="cards d-flex" style="width: 360px; height: 170px;">
            <div class="rectangle"></div> 
            <div class="container d-flex align-items-center flex-column mt-4">
              <img src="../Images/mdi_progress-clock.png"  width="80px" height="80px">
              <span class="container text-center text-decoration-none mt-1">
                  <p id="myPets">My Appointment Requests</p>  
              </span>
            </div>
        </div>
        </a>
      </div>
      
 </div> 
 
<div class="mb-4">
  <div class="upcoming-apt">
    <p>Upcoming Appointments</p>
  <div class="line"></div>
</div>

<div id="note-container">
      <div id="note-content" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeNote()">X</button>
        <h3>Note</h3>
        <p id="note"></p>
      </div>
    </div>

<div class="box mb-5">
 <table>

    <thead>
    <tr>
      <th class="text-center pt-4 pb-2">Pet</th>
      <th class="text-center pt-4 pb-2">Service</th>
      <th class="text-center pt-4 pb-2">Date</th>
      <th class="text-center pt-4 pb-2">Time</th>
      <th class="text-center pt-4 pb-2">Notes</th>
    </tr>
    </thead>

      <tbody>
      </tbody>
      <?php include 'PHP/UpcomingDashboard.php'?>
      </table>
    </div>
   </div>
  </body>
  
</html>