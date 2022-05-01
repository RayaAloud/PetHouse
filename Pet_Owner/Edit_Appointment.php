<!DOCTYPE html>
<?php
 session_start();
?>
<html>
<head>
  <title>Edit Appointment</title>
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
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--External CSS-->
  <link rel="stylesheet" href="Styles/Edit_Appointment.css">
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
      var time = $('#timeSelect').val();
      if(time == "Select Time")
        return false;
      sessionStorage.setItem('Request_Appoinemtent_Time',time);
      return true;
   }
   
   function update(){
       var date = new Date(sessionStorage.getItem('Current_Selected_Date'));
       var time = sessionStorage.getItem('Request_Appoinemtent_Time');
       var service = sessionStorage.getItem('Request_Appoinemtent_Service');
       var note = sessionStorage.getItem('Notes');
       date = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
        $.ajax({
           url: 'PHP/Add_Appt_Request.php',
           method: 'POST',
           data: {petName : 'Java', date : date, time : time, service : service, note : (note == null)? null : note},
        }).done(function(msg){
           alert(msg)
        })
   }
   var list1;
   var currentDate;
   function setList(list){
       console.log(list1)
       list1 = list;
   }   
    function getList(list){
      console.log(list1);
      return list1
    }
    function checkIfExists(day,month,year){
      var dates = getList();
       for(var i = 0; i < dates.length; i++){
           var date = dates[i].Date.split("-");
           var availableYear = date[0];
           var availableMonth = date[1];
           var availableDay = date[2]
           if(availableYear == year && availableMonth == (1+month) && availableDay == day)
             return true
       }
       return false
    }
    function displayTimes(){
      document.getElementById('timeSelect').innerHTML = "<option>Select Time</option>";
      var dates = getList();
      var times = [];
      var counter = 0;
       for(var i = 0; i < dates.length; i++){
           var date = dates[i].Date.split("-");
           var availableYear = date[0];
           var availableMonth = date[1];
           var availableDay = date[2];
           var time = dates[i].Time.split(":");
           console.log(currentDate.getFullYear() +" " +currentDate.getMonth()+" "+currentDate.getDate());
           if(availableYear == currentDate.getFullYear() && availableMonth == (currentDate.getMonth()+1) && availableDay == currentDate.getDate()){
              if(time[0] < 12){
                if(time[0] == 0)
                time = (parseInt(time[0])+12)+":"+time[1]+" AM";
                else
                time = time[0]+":"+time[1]+" AM";
              }
              else{
                if(time[0] == 12){
                  time = time[0]+":"+time[1]+" PM";
                  }
                  else{
                  time = (time[0]-12)+":"+time[1]+" PM";
                  }
              }  
            document.getElementById('timeSelect').innerHTML += "<option>"+time+"</option>";
           }
       }     
    }
   $(document).ready(function(){
    showPage('Signed_In_Header.html', 'header');
    $('#updateBtn').click(function(){
      alert("Hi");
    })
    $.ajax({
      url: 'PHP/Retrieve_Available_Appt_for_Service.php',
      method: 'POST',
      dataType: 'JSON',
      cache: false,
      data: {serviceName : 'Checkup'}
      }).done(function(msg){
        setList(msg);
        $( "#datepicker" ).datepicker({
        onSelect: function(){
            currentDate = $("#datepicker").datepicker("getDate");
            sessionStorage.setItem('Current_Selected_Date', currentDate);
            displayTimes();    
        },
        minDate:0 ,
        beforeShowDay: function(date) {
          var day = date.getDate();
          var month = date.getMonth();
          var year = date.getFullYear();
          return [checkIfExists(day,month,year), ''];
          }
        });
       })
    })
   
    </script>
</head>
<body>

<span id="header"></span>
<img src="../Images/Vector.png" id="bcImg1">
<img src="../Images/designer_1.png" id="bcImg2">
<div class="container pt-4 d-flex mb-5 justify-content-center">
  <div class="box col-sm-11 col-lg-8 d-flex flex-column px-5">
      <div class="d-flex flex-column align-items-center">
        <span id="msg" class="col-7"></span>
        <div id="AppointmentOptions" class="">
          <div id="pet" class="pb-5 d-flex justify-content-between align-items-center">
            <div>
                <img src="../Images/catBabyBlue.png" class="">
                <span>&nbsp;</span>
                <label for="petsList">Pet</label>
            </div>
            <select id="petsList">
            <!--Owner's Pets Here-->  
            </select>
          </div>
          <div class="d-flex align-items-center pb-5">
            <button id="previous" class="next-previous mr-5"><i class="bi bi-chevron-left"></i></button>     
             <div>
              <div id="ServicesList" class="mt-5 mb-3">
              <!--Serives Here-->   
              </div>
            </div>
            <button id="next" class="next-previous"><i class="bi bi-chevron-right"></i></button>
          </div>
        </div>
        <div id="AppointmentDateTime" class="">

        </div>
        <div class="d-flex flex-sm-column flex-lg-row container justify-content-around">
          <div id="datepicker"></div>
          <div class="d-flex flex-column">
            <label for="timeSelect" class="mb-4" id="timeLabel">Time</label>
            <select id="timeSelect" class="px-2 mb-3">
            <option>Select Time</option>
            </select>
            <textarea class="col-12 p-2 mt-5" placeholder="Notes (Optional)..." id="note"></textarea>
          </div>
       </div>
      </div>
      <div class="row col-sm-10 col-lg-6 justify-content-center align-self-center mt-5">
        <div class="btnContainer d-flex justify-content-evenly mt-4" id="btnsContainer">
           <a class="text-decoration-none" href="AppointmentRequests.html"><button class="movingBtns lightBtn" id="cancelBtn">Cancel</button></a>
            <button class="movingBtns darkBtn" id="updateBtn">Update</button>
        </div>
    </div>
  </div>
</div>
<?php include 'PHP/Appointment_Options.php'?>
  <script> 
    var acc = document.getElementsByClassName("collap");
    var acc2 = document.getElementsByClassName("content");
        for(let i = 0; i<acc.length; i++){
          $(acc[i]).click(function(){
            this.classList.toggle('active');
            var j = 0;
            if($(acc2[i]).css('display') === "block"){
              $(acc2[i]).css('display', 'none');  
            }
            else if($(acc2[i]).css('display') === "none"){
              $(acc2[i]).css('display', 'block');    
            }
            j++;
          });
        }
  </script>
</body>
</html>