<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../index.php");
}
?>
<html>
<head>
  <title>Request Appointment</title>
  <!--Meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="../Images/favicon_io/site.webmanifest">
  <!--Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!--jQuery-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <!--AJAX-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--External CSS-->
  <link rel="stylesheet" href="Styles/Request_Appointment.css">
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
   
   function activeCircle(id1,id2){
     document.getElementById(id1).style.backgroundColor = '#ffffff';
     document.getElementById(id2).style.backgroundColor = '#111B47';
   }
   function checkService(){
     var services = document.getElementsByName('service');
     for(var i = 0; i < services.length; i++){
       if(services[i].checked){
        var service = services[i].parentNode.childNodes[1].childNodes[1].innerHTML;
        sessionStorage.setItem('Request_Appoinemtent_Service',service);
         return true;  
       }    
     }
     return false;
   }
   function checkDate(){
      var date = sessionStorage.getItem('Current_Selected_Date');
      console.log(date);
      if (date == '')
        return false;
      return true;
   }
   function checkTime(){
      var time = $('#timeSelect');
      if(time.val() == "Select Time")
        return false;
      sessionStorage.setItem('Request_Appoinemtent_Time',time.val());
      return true;
   }
   var currentPage = 0;
   function move(id){  
     var backBtn =  document.getElementById('backBtn');
     var nextBtn =  document.getElementById('nextBtn');
     var move = true;
     switch(id){
       case "cancelBtn": window.location.href = "#"; break;
       case "backBtn": 
     
          if(currentPage == 1){
              showPage('AppointmentOptions.php', 'AppointmentOptions');
              backBtn.style.display = 'none';
              document.getElementById('btnsContainer').classList.remove('col-6');
              document.getElementById('btnsContainer').classList.add('col-4');
              activeCircle('circle2','circle1');    
              document.getElementById('msg').innerHTML = "";
          }
          else if(currentPage == 2){
            showPage('AppointmentDateTime.html', 'AppointmentOptions');
            activeCircle('circle3','circle2');
            document.getElementById('msg').innerHTML = "";  
            switchBtns('confirm');
          }      
          currentPage--;
       break;
       case "nextBtn":    
          if(currentPage == 0){
            if(checkService()){
              showPage('AppointmentDateTime.html', 'AppointmentOptions');
              activeCircle('circle1','circle2');
              document.getElementById('msg').innerHTML = "";
            }
            else{
              document.getElementById('msg').innerHTML = "<div class=\'alert alert-warning\' role=\'alert\'>Please select a service</div>";
              move = false;
            }
        
          }
          else if(currentPage == 1){
            if(checkDate() && checkTime()){
              showPage('AppointmentDetails.html', 'AppointmentOptions');
              switchBtns('next');
              activeCircle('circle2','circle3');
              document.getElementById('msg').innerHTML = "";
              sessionStorage.setItem('Notes',$('#note').val());
            }
            else{
              if(checkDate())
                document.getElementById('msg').innerHTML = "<div class=\'alert alert-warning\' role=\'alert\'>Please select a time</div>";
              else if(checkTime())
                document.getElementById('msg').innerHTML = "<div class=\'alert alert-warning\' role=\'alert\'>Please select a date</div>";
              else 
                document.getElementById('msg').innerHTML = "<div class=\'alert alert-warning\' role=\'alert\'>Please select a date and time</div>";
              move = false;
            }  
          }
          if(move){
            document.getElementById('btnsContainer').classList.remove('col-4');
            document.getElementById('btnsContainer').classList.add('col-6');
            backBtn.style.display = 'block';
            currentPage++;
          }
       break;
     }  
   }
   function switchBtns(btn){
     if(btn == "next"){
      var button = document.getElementById('nextBtn')
      var btnParent = button.parentNode;
      btnParent.removeChild(button);
      var newBtn = document.createElement('button');
      newBtn.setAttribute('class', 'movingBtns darkBtn');
      newBtn.setAttribute('id', 'confirmBtn');
      newBtn.innerHTML = "Confirm";
      btnParent.appendChild(newBtn);
      newBtn.addEventListener('click', function(){
        confirm();
      }, false);
     }
     else if(btn == "confirm"){
      var button = document.getElementById('confirmBtn')
      var btnParent = button.parentNode;
      btnParent.removeChild(button);
      var newBtn = document.createElement('button');
      newBtn.setAttribute('class', 'movingBtns darkBtn');
      newBtn.setAttribute('id', 'nextBtn');
      newBtn.innerHTML = "Next";
      btnParent.appendChild(newBtn);
      newBtn.addEventListener('click', function(){
        move('nextBtn');
      }, false);
     }
   }
   function closeMsg(){
         $("#delete-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
         window.location.href = "AppointmentRequests.php";
   }
   function confirm(){
       var note = sessionStorage.getItem('Notes');
       var time = sessionStorage.getItem('Request_Appoinemtent_Time').split(" ");
       var date = new Date(sessionStorage.getItem('Current_Selected_Date'));
       date = date.getFullYear() + "-" + (date.getMonth() +1) + "-" + date.getDate();
       var period = time[1];
       time = time[0].split(":");
       time[0] = parseInt(time[0]);
       time[1] = parseInt(time[1]);
       if(parseInt(time[0]) == 12){
          if(period == "AM"){
            time = '00'+":"+time[1];
          }
          else if(period == "PM")
            time = time[0]+":"+time[1];
       }
       else if(parseInt(time[0]) < 12){
          if(period == "AM"){
            time = time[0]+":"+time[1];
          }
          else if(period == "PM")
            time = (time[0]+12)+":"+time[1];
       }
        $.ajax({
           url: 'PHP/Add_Appt_Request.php',
           method: 'POST',
           data: {time : time, date : date, service_name : sessionStorage.getItem('Request_Appoinemtent_Service'), petID :  sessionStorage.getItem('Request_Appoinemtent_Pet'), note : (note == null)? null : note},
        }).done(function(msg){
           if(msg == 1){
            $('#darkBcground').css('display','block');
            $('#delete-confirmation').css('display','block');  
           }
        })
   }
   $(document).ready(function(){
     showPage('Signed_In_Header.html', 'header');
     showPage('AppointmentOptions.php', 'AppointmentOptions');
     $('#okButton').click(function(){
       closeMsg();
    })
   })
   
    </script>
</head>
<body>
<div id="darkBcground"></div>
<span id="header"></span>
<img src="../Images/designer_1.png" id="bcBluePath">
<img src="../Images/undraw_playful_cat_re_ac9g.png" id="bcImg">
<!--Msg-->
<div id="delete-confirmation">
      <div id="content-container" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelButton" class="align-self-end" onclick="closeMsg()">X</button>
        <i class="bi bi-check-circle-fill"></i>
        <h4 class="mb-5 text-center msg">Appointment Requested Successfully</h4>
        <div id="btns-container">
            <button id="okButton">OK</button>
        </div>
      </div>
</div>

<div class="container pt-4 d-flex justify-content-end px-2 mb-5">
  <div class="d-flex flex-column px-5">
    <div class="row mb-3">
        <div id="timeLine" class="d-flex">
            <div class="outerCircle d-flex"><div id="circle1" class="innerCircle align-self-center activeCircle m-auto"></div></div>
            <span class="lines align-self-center"></span>
            <div class="outerCircle d-flex"><div id="circle2" class="innerCircle align-self-center nonActive m-auto"></div></div>
            <span class="lines align-self-center"></span>
            <div class="outerCircle d-flex"><div id="circle3" class="innerCircle align-self-center nonActive m-auto"></div></div>       
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <span id="msg" class="col-7"></span>
        <div id="AppointmentOptions" class=""></div>
      </div>
      <div class="row justify-content-center mt-2">
        <div class="btnContainer col-4 d-flex justify-content-between mt-4" id="btnsContainer">
           <a class="text-decoration-none" href="Dashboard.php"><button class="movingBtns lightBtn" onclick="move('cancelBtn')" id="cancelBtn">Cancel</button></a>
            <button class="movingBtns darkBtn d-hidden" id="backBtn" onclick="move('backBtn')">Back</button>
            <button class="movingBtns darkBtn" onclick="move('nextBtn')" id="nextBtn">Next</button>
        </div>
    </div>
  </div>
</div>
  <script> 
  
  </script>
</body>
</html>