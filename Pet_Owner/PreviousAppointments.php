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
    <title>Previous Appointments</title>
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
    <!--External CSS-->
    <link rel="stylesheet" href="Styles/Appointments.css">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
        z-index: 3;
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
        background-color: #232e54;
        color: white;
        border-radius: 40px;
        padding: 0.5em 1em 0.5em 1em;
      }
      #submitReviewBtn:hover{
        background-color: #111B40;
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
        right:-4em;
        height: 500px;
        z-index: -1;
        transform: rotate(90deg);
        top: 20vh;
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
  $(document).ready(function(){
    showPage('Signed_In_Header.php', 'header');
  })
</script>
<script>
      function show(appointment){
        $('#star1, #star2, #star3, #star4, #star5').html('&#9734;').css('color','#a1a1a1');
        document.getElementById("divv").style.display ='block';
        $('#darkBcground').css('display','block');
        var appt = appointment.parentNode.parentNode;
        sessionStorage.setItem('Appt_to_be_reviewed', appt.getAttribute('id'));
        sessionStorage.setItem('rate', 0);
      }
      function closeDiv(){
         document.getElementById("divv").style.display ='none';
         $('#darkBcground').css('display','none');
      }
      function selectRate(starID){
        $('#star1, #star2, #star3, #star4, #star5').html('&#9734;').css('color','#a1a1a1');
        switch(starID){
          case "star1": 
          $('#star1').html('&#9733;').css('color','#111B47');
          sessionStorage.setItem('rate', 1);
          break;
          case "star2": 
          $('#star1, #star2').html('&#9733;').css('color','#111B47');
          sessionStorage.setItem('rate', 2);
          break;
          case "star3":
          $('#star1, #star2, #star3').html('&#9733;').css('color','#111B47');
          sessionStorage.setItem('rate', 3);
          break;
          case "star4": 
          $('#star1, #star2, #star3, #star4').html('&#9733;').css('color','#111B47');
          sessionStorage.setItem('rate', 4);
          break;
          case "star5": 
          $('#star1, #star2, #star3, #star4, #star5').html('&#9733;').css('color','#111B47');
          sessionStorage.setItem('rate', 5);
          break;
        }
      }
</script>
</head>

<body>
<div id="darkBcground"></div>
  <div id="cont">
    <span id="header"></span>
   <img src="../Images/Vector.png" id="bcImg">
    <div id="divv">
      <div id="divCont" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeDiv()">X</button>
        <h1 id="q" class="mb-5">How was the appointment?</h1>
        <img class="mb-3" src="../Images/Component 42.png" height="120px">
        <div class="d-flex">
          <span class="star" id="star1" onclick="selectRate('star1')">&#9734;</span>
          <span class="star" id="star2" onclick="selectRate('star2')">&#9734;</span>
          <span class="star" id="star3" onclick="selectRate('star3')">&#9734;</span>
          <span class="star" id="star4" onclick="selectRate('star4')">&#9734;</span>
          <span class="star" id="star5" onclick="selectRate('star5')">&#9734;</span>
        </div>
        <textarea class="mb-3" placeholder="Notes..." id="text" rows="6"></textarea>
        <button id="submitReviewBtn">Submit</button>
      </div>
    </div>
    <div id="divv2">
      <div id="divCont2" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeNote()">X</button>
        <h3>Note</h3>
        <p id="note"></p>
      </div>
    </div>
<div class="mb-5">
  <div class="upcoming-apt">
    <p>Previous Appointments</p>
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
      <th class="text-center pt-4 pb-2">Review</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
</div>
</div>
</body>
<?php include 'PHP/Retrieve_Previous_Appts.php'?>
<script>
  $('#submitReviewBtn').click(function(){

    $.ajax({
      url: 'PHP/Add_Review.php',
      method: 'POST',
      data: {rate : sessionStorage.getItem('rate'), opinion : ($(text).val() == "")? null : $(text).val(), appt_ID : sessionStorage.getItem('Appt_to_be_reviewed')}
    }).done(function(msg){
      alert(msg)
    })
    $('#cancelBtn').click();
  })
</script>
</html>