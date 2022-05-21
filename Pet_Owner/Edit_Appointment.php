<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../index.php");
}
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
   
   
    </script>
</head>
<body>
<span id="header"></span>
<img src="../Images/Vector.png" id="bcImg1">
<img src="../Images/designer_1.png" id="bcImg2">
<div class="container pt-4 d-flex mb-5 justify-content-center">
  <div class="box col-sm-11 col-lg-8 d-flex flex-column px-5">
    <div class="title">
      <p>Edit Appointment</p>
      <div class="line"></div>
    </div>
    <div class='alert alert-warning mt-4 w-75' role='alert' id="warning_alert" style="display: none"></div>
    <div class="alert alert-success mt-4 w-75" id="success_alert" role="alert" style="display: none"></div>
    <form id="Edit_Appt_Form">
      <div class="d-flex flex-column align-items-center mt-5">
        <div id="AppointmentOptions" class="text-center">
          <div id="pet" class="pb-5 d-flex justify-content-around align-items-center">
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
      
       <div class="row col-sm-10 col-lg-6 justify-content-center align-self-center mt-5">
        <div class="btnContainer d-flex justify-content-evenly mt-4" id="btnsContainer">
           <a class="text-decoration-none" href="AppointmentRequests.php"><button class="movingBtns lightBtn" id="cancelBtn" type="button">Cancel</button></a>
            <button class="movingBtns darkBtn" id="updateBtn">Update</button>
        </div>
       </div>
    </div>
    </form>
  </div>
</div>
<?php include 'PHP/Edit_Appt_Options.php'?>
</body>
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
   var list1;
   var currentDate;
   function setList(list){
       list1 = list;
   }   
    function getList(list){
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
       for(var i = 0; i < dates.length; i++){
           var date = dates[i].Date.split("-");
           var availableYear = date[0];
           var availableMonth = date[1];
           var availableDay = date[2];
           var time = dates[i].Time.split(":");
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
            document.getElementById('timeSelect').innerHTML += "<option av-id="+dates[i].Appt_ID+">"+time+"</option>";
           }
       }     
    }
    
  function displayDates(service){
    $.ajax({
      url: 'PHP/Retrieve_Available_Appt_for_Service.php',
      method: 'POST',
      dataType: 'JSON',
      cache: false,
      data: {serviceName : service}
      }).done(function(msg){
        setList(msg);
        $("#datepicker").datepicker({
        onSelect: function(){
            currentDate = $("#datepicker").datepicker("getDate");
            sessionStorage.setItem('Current_Selected_Date', currentDate);
            displayTimes();
        },
        minDate:0,
        beforeShowDay: function(date) {
          var day = date.getDate();
          var month = date.getMonth();
          var year = date.getFullYear();
          var thisDate = new Date(sessionStorage.getItem('Appt_Request_Date'))
          var show = (thisDate.getDate() === day) && (thisDate.getMonth() === month) && (thisDate.getFullYear() === year);
          return [checkIfExists(day,month,year) || show === true, ''];
          },
        })
        var appt_date = new Date(sessionStorage.getItem('Appt_Request_Date'));
        var cells = document.getElementsByClassName('ui-state-default');
        for(var k = 0; k < cells.length; k++){
          if(cells[k].parentNode.getAttribute('data-year') == appt_date.getFullYear() &&
          cells[k].parentNode.getAttribute('data-month') == appt_date.getMonth() &&
          cells[k].getAttribute('data-date') == appt_date.getDate()){
            cells[k].click();
            //sessionStorage.setItem('Current_Selected_Date', sessionStorage.getItem('Appt_Request_Date'));
            var allOpt = $('#timeSelect').children();
            var exists = false;
            for(var m = 0; m<allOpt.length; m++){
              if(allOpt[m].innerHTML = sessionStorage.getItem('Appt_Request_Time'))
                exists = true;
            }
            if(exists === false){
               document.getElementById('timeSelect').innerHTML += " <option selected>"+sessionStorage.getItem('Appt_Request_Time')+"</option>"; 
            }
          }
        }
       })
    }

    $(document).ready(function(){
        showPage('Signed_In_Header.php', 'header');
        displayDates(sessionStorage.getItem('Appt_Request_Service'));
        $('#petsList').val(sessionStorage.getItem('Appt_Request_Pet'));
        $('#'+sessionStorage.getItem('Appt_Request_Service')).prop('checked', true);
        $('#note').val(sessionStorage.getItem('Appt_Request_Note')); 
    })
    sessionStorage.setItem('Edit_Appt_service', sessionStorage.getItem('Appt_Request_Service'));
    $('input:radio[name="service"]').change(function(){
      sessionStorage.setItem('Current_Selected_Date', '');
      document.getElementById('timeSelect').innerHTML = "<option>Select Time</option>";
      sessionStorage.setItem('Edit_Appt_service', $(this).val());
      $.ajax({
            url: 'PHP/Retrieve_Available_Appt_for_Service.php',
            method: 'POST',
            dataType: 'JSON',
            cache: false,
            data: {serviceName : $(this).val()},
            }).done(function(message){
              if(message != 0){
              setList(message);
              $("#datepicker").datepicker('destroy');
              $("#datepicker").datepicker({
                
              onSelect: function(){
                  currentDate = $("#datepicker").datepicker("getDate");
                  sessionStorage.setItem('Current_Selected_Date', currentDate);
                  displayTimes();    
              },
              minDate:0,
              beforeShowDay: function(date) {
                var day = date.getDate();
                var month = date.getMonth();
                var year = date.getFullYear();
                return [checkIfExists(day,month,year), ''];
             },
          })
         }
         else{
          $("#datepicker").datepicker('destroy');
          $("#datepicker").datepicker({
                minDate:0,
                beforeShowDay: function(date) {
                  return [false, ''];
               },
            })
         }
        })
      })
     
      $('#petsList').change(function(){
        var option = $(this).find("option:selected");
        sessionStorage.setItem('Edit_Appt_Pet', $(option).attr('id'));
      })
      $('#Edit_Appt_Form').submit(function(e){
         $('#warning_alert').css('display', 'none');
         $('#warning_alert').html('');
         $('#success_alert').css('display', 'none');
         $('#success_alert').html('');
         e.preventDefault();
         var thereIsError = false;
         var checkService1 = checkService();
         var checkDate1 = checkDate();
         var checkTime1 = checkTime();
         if(checkDate1 === false && checkTime1 === false){
          document.getElementById('warning_alert').innerHTML += 'Please select date and time<br>'; 
          thereIsError = true
         }
         else if(checkDate1 === false){
          document.getElementById('warning_alert').innerHTML += 'Please select date<br>'; 
          thereIsError = true
         }
         else if(checkTime1 === false){
          document.getElementById('warning_alert').innerHTML += 'Please select time<br>'; 
          thereIsError = true
          }
         if(thereIsError === false){
            var avID = $('#timeSelect').find("option:selected");
            avID = $(avID).attr('av-id');
            var checkBit = 1
            if(avID == undefined){
              checkBit = 0;
            }
            var time = $('#timeSelect').val().split(" ");
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
           method: 'POST',
           url: 'PHP/Edit_Appt_Request.php',
           data: {appt_ID : sessionStorage.getItem('Appt_Request_ID'), date : date, time : time, service : sessionStorage.getItem('Edit_Appt_service'), note : $('#note').val(), petID :  sessionStorage.getItem('Edit_Appt_Pet'), avID : (checkBit == 1)? avID : -1}
         }).done(function(msg){
          $('#success_alert').html('Appointment Updated Successfully');
          $('#success_alert').css('display', 'block');
          sessionStorage.setItem('Appt_Request_Date', new Date(sessionStorage.getItem('Current_Selected_Date')));
         })
        }
        else{
          $('#warning_alert').css('display', 'block');
        }
      })
  </script>
</html>