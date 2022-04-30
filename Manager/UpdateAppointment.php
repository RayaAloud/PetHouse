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
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
  var currentDate;
  $( function() {
    $( "#datepicker" ).datepicker({
      onSelect: function(){
        currentDate = $( "#datepicker" ).datepicker( "getDate" );
        currentDate = currentDate.getFullYear() + "-" + (currentDate.getMonth()+1) + "-" + currentDate.getDate();
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
        border: 1px solid #A2ABD1;
        background: #8d94b7;
        color: white;
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

         <div id="Servandtime" class="d-flex flex-column">
          <form id="form">
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
          <div id="add" class="align-self-center">
            <button id="addbtn" type="submit">Update</button>
          </div>
        </form>
    </div>
    </div>
     </div>
    </body>
    <?php include 'PHP/Get_Services_Names.php'?>
    <?php $id =  $_GET['ID'] ;
     $_SESSION['Appointment_ID_to_be_Edited'] = $id;?>
    <script>
      $('#form').submit(function(event){
        event.preventDefault();
        $.ajax({
          url: 'PHP/Edit_appointment.php',
          method: 'POST',
          data: {service : $('#serviceOptions').val(), date : currentDate, time: $('#time1').val()}
        }).done(function(msg){
          alert(msg);
          
        })
      })

    </script>
</html>
