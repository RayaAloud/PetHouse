<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Appointment</title> 
    <!--External CSS-->
    <link rel="stylesheet" href="Style/AddAppointment.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--jQuery-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
  var currentSelectedDate;
  $( function() {
    var oldDate = sessionStorage.getItem('Available_appt_toBe_Edited_Date').split("/");
    var date = oldDate[2]+"-"+oldDate[1]+"-"+oldDate[0];
    sessionStorage.setItem('current_selected_date',date);
    date = new Date(oldDate[2]+"-"+oldDate[1]+"-"+oldDate[0]);
    $( "#datepicker" ).datepicker({
      defaultDate: date,
      onSelect: function(){
        currentSelectedDate = $( "#datepicker" ).datepicker( "getDate" );
        currentSelectedDate = currentSelectedDate.getFullYear() + "-" + (currentSelectedDate.getMonth()+1) + "-" + currentSelectedDate.getDate();
        sessionStorage.setItem('current_selected_date',currentSelectedDate);
      },
      minDate:0 ,
      beforeShowDay: function(date) {
        var day = date.getDate();
        var month = date.getMonth();
        return [true, ''];;
     }
    });
  });
 
  </script>
  <style>
     #serviceInput{
      border-radius: 30px;
      border: 2px solid #c0c0c0;
    }
      .ui-widget-header{
          background: #A2ABD1 ;
      }
      .ui-datepicker-month, .ui-datepicker-year{
          color: white;
      }
      .ui-state-highlight, .ui-widget-content .ui-state-highlight{
        border: 1px solid #c5c5c5;
        background: #f6f6f6;
        font-weight: normal;
        color: #454545;
      }
      .ui-datepicker{
        width: 20rem;
        height: 340px;

    }
    .ui-datepicker td a, .ui-state-default {
     
    }
  </style>
    
</head>
    <body>
  <div id="addService">
     <h2>Edit Appointment</h2>
     <div class="line"></div>
      <form id="form">
         <div id="Servandtime" class="d-flex flex-column">
            <div id="serv">
                <label>
                    Service 
                    <select id="serviceOptions">
                    </select>
                </label>
            </div>
            <div class="d-flex">
                <div id="datepicker"></div>
                <div class="d-flex flex-column justify-content-center">
                  <div id="time">
                      <span class="d-block">Time </span><input type="time" name="time1" id="time1" />
                  </div>
                </div>
            </div>
          <div id="add" class="mt-2 align-self-center">
            <a href="SideMenu.php"><button class="addbtn" id="cancel" type="button">Cancel</button></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="addbtn" type="submit">Update</button>
          </div> 
       </div>
     </form>
    </div>
     </div>
    </body>
    <?php include 'PHP/Get_Services_Names.php'?>
    <script>
      var time = sessionStorage.getItem('Available_appt_toBe_Edited_Time');
      time = time.split(" ");
      period = time[1];
      time = time[0];
      time = time.split(":");
      time[0] = parseInt(time[0]);
      time[1] = parseInt(time[1]);
      if(time[0] == 12){
        if(period == "AM"){
          time = '00'+":"+time[1];
        }
        else if(period == "PM")
          time = time[0]+":"+time[1];
        }
          else if(time[0] < 12){
        if(period == "AM"){
          time = time[0]+":"+time[1];
        }
        else if(period == "PM")
          time = (time[0]+12)+":"+time[1];
      }
      $('#time1').val(time);
      $('#serviceOptions').val(sessionStorage.getItem('Available_appt_toBe_Edited_service'));
      $('#form').submit(function(event){
        event.preventDefault();
        $.ajax({
          url: 'PHP/Edit_appointment.php',
          method: 'POST',
          data: {ApptId : sessionStorage.getItem('Available_appt_toBe_Edited_Id'), service : $('#serviceOptions').val(), date : sessionStorage.getItem('current_selected_date'), time: $('#time1').val()}
        }).done(function(msg){
          alert(msg);
        })
      })
    
    </script>
</html>
