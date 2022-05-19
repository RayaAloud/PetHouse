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
    <title>Appointment Requests</title>
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico"> 
    <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
    <!--External CSS-->
    <link rel="stylesheet" href="Styles/Appointments.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
      #divv{
        display: none;
        position: absolute;
        margin-left: 25em;
        background-color: white;
      }
      #divCont{
        box-shadow: 1px 1px 15px 2px #d8d8d8;
        width: 600px;
        min-height: 300px;
        z-index: 3;
        padding: 2em;
      }
      #divv2{
        display: none;
        position: absolute;
        margin-left: 30em;
        background-color: white;
        margin-top: 5em;
      }
      #divCont2{
        box-shadow: 1px 1px 15px 2px #d8d8d8;
        width: 250px;
        min-height: 100px;
        z-index: 3;
        padding: 1em;
      }
      #divCont2 p{
        overflow-y: scroll;
      }
      #submitReviewBtn{
        border: none;
        background-color: #111B47;
        color: white;
        border-radius: 40px;
        padding: 0.5em 1em 0.5em 1em;
      }
      #q{
        color:#1f2a5d;
      }
      #text{
        width: 60%;
      }
      #cancelBtn{
        border: none;
        background: none;
      }
      #bcImg{
        position: absolute;
        left:-4em;
        height: 500px;
        z-index: -1;
        top: 35vh;
      }
      #bcImg2{
        position: absolute;
        width: 600px;
        height: 500px;
        bottom: 0;
        right: -3em;
        z-index: -1;
        top: 30%;
        transform: rotate(270deg);
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
    function closeMsg(){
         $("#delete-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
    }
  $(document).ready(function(){
    showPage('Signed_In_Header.php', 'header');
    var editBtns = $('.editBtn');
    for(var i = 0; i < editBtns.length; i++){
      $(editBtns[i]).click(function(){
          var appointment = $(this).parent().parent();
          sessionStorage.setItem('Appt_Request_ID', $(appointment).attr('id'));
          sessionStorage.setItem('Appt_Request_Service', $(appointment).children()[1].innerHTML);
          sessionStorage.setItem('Appt_Request_Pet', $(appointment).children()[0].getAttribute('pet_name'));
          var dateString = ($(appointment).children()[2].innerHTML).split("/");
          dateString = dateString[2] + "-" + dateString[1] + "-" + dateString[0];
          sessionStorage.setItem('Appt_Request_Date', new Date(dateString));
          sessionStorage.setItem('Appt_Request_Time', $(appointment).children()[3].innerHTML);
          $.ajax({
            url: 'PHP/Retrieve_Notes.php',
            method: 'POST',
            data: {Appt_ID : $(appointment).attr('id')},
          }).done(function(msg){
            sessionStorage.setItem('Appt_Request_Note', msg);
          })
          window.location.href = "Edit_Appointment.php";
      })
    }
    var cancelBtns = $('.cancelButtons');
    var appointmentID;
    for(var i = 0; i < cancelBtns.length; i++){
      $(cancelBtns[i]).click(function(){
          appointmentID = $(this).parent().parent().attr('id');
          $('#darkBcground').css('display','block');
          $('#delete-confirmation').css('display','block');     
      })
    }
    $('#cancelButton').click(function(){
       closeMsg();
    })
    $('#cancel-appt-Button').click(function(){
      $.ajax({
        url: 'PHP/Cancel_Appt.php',
        method: 'POST',
        data: {apptID : appointmentID}
        }).done(function(msg){
            alert(msg);
            closeMsg();
        })
    })
  })
  

      function showNote(btn){
         var appointmentID = $(btn).parent().parent().attr('id'); 
         $.ajax({
           url: 'PHP/Retrieve_Notes.php',
           method: 'POST',
           data: {Appt_ID : appointmentID},
         }).done(function(msg){
          $('#note').html(msg);
          $('#divv2').css('display', 'block'); 
         })
      }
      function closeNote(){
         document.getElementById("divv2").style.display ='none';
      }
</script>
</head>

<body>
 <div id="darkBcground"></div>
  <div id="cont">
    <span id="header"></span>
   <img src="../Images/Vector.png" id="bcImg">
   <img src="../Images/designer_1.png" id="bcImg2">
    <div id="divv2">
      <div id="divCont2" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeNote()">X</button>
        <h3>Note</h3>
        <p id="note"></p>
      </div>
    </div>

    <div id="delete-confirmation">
      <div id="content-container" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeMsg()">X</button>
        <h3 class="mb-5">Cancel this appointment?</h3>
        <div id="btns-container">
            <button id="cancelButton">No</button>
            <button class="confirm-action-Button" id="cancel-appt-Button">Yes</button>
        </div>
      </div>
    </div>

<div class="mb-5">
  <div class="upcoming-apt">
    <p>My Appointments Requests</p>
  <div class="line"></div>
</div>
<div class="box mb-5 mt-5">
 <table>

    <thead>
    <tr>
      <th class="text-center pt-4 pb-2">Pet</th>
      <th class="text-center pt-4 pb-2">Service</th>
      <th class="text-center pt-4 pb-2">Date</th>
      <th class="text-center pt-4 pb-2">Time</th>
      <th class="text-center pt-4 pb-2">Notes</th>
      <th class="text-center pt-4 pb-2">Status</th>
      <th class="text-center pt-4 pb-2"></th>
    </tr>
    </thead>
    <tbody>
      <!--Appointment Requests Here..-->
    </tbody>
  </table>
</div>
</div>
</div>
</body>
<?php include'PHP/Retrieve_Appt_Requests.php'?>
</html>