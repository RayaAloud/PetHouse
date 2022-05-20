<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Appointment</title> 
    <link rel="stylesheet" href="Style/AddAppointment.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="Forms_Validations.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          onSelect: function(){var currentDate = $("#datepicker").datepicker("getDate")
            document.getElementById('dateInput').value = currentDate.getFullYear() + "-" + (currentDate.getMonth()+1) + "-" + currentDate.getDate();
            sessionStorage.setItem('Current_Selected_Date_Add_appt',currentDate);
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
          .ui-widget-header{
              background: #A2ABD1 ;
          }
          td{
              border-radius: 50px;
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
        iframe{
          height: 0;
        }
      </style>
    
</head>
    <body>
  <div id="addService">
     <h2>Add Appointment</h2>
     <div class="line"></div>
     <div class='alert alert-warning mt-4' role='alert' id="warning_alert" style="display: none"></div>
      <div class="alert alert-success mt-4" id="success_alert" role="alert" style="display: none"></div>
      <iframe id="iframe" name="my_iframe"></iframe>
       <form method="POST" action="PHP/Add_Appointment.php" id="add_appt_form">
          <div id="Servandtime" class="d-flex flex-column">
              <div id="serv">
                  <label>
                      Service 
                      <select id="serviceOptions" name="service">
                      </select>
                  </label>
              </div>

              <div class="d-flex">
                  <div id="datepicker" class="mt-5"></div>
                  <input type="hidden" name="date" id="dateInput">
                  <div class="d-flex flex-column justify-content-center">
                  <div id="time">
                      <span class="d-block">Time </span><input type="time" name="time" id="time1"/>
                  </div>
              </div>
                  
            </div>
            <div id="add" class="align-self-center">
              <button class="addbtn" type="submit" name="add">Add</button>
            </div>
        </div>
       </form>
      </div>
    </div>
  </body>
  <?php include 'PHP/Get_Services_Names.php'?>
  <script>
  $(document).ready(function(){
    sessionStorage.setItem('Current_Selected_Date_Add_appt','');
  })
  $('#add_appt_form').submit(function(e){
    $('#warning_alert').html("");
    $('#warning_alert').css('display', 'none');
    $('#success_alert').html("");
    $('#success_alert').css('display', 'none');
    $('#add_appt_form').removeAttr('target')
    $('#Servandtime').css('margin-top','4em');
     var thereIsError = false;
     var date =  sessionStorage.getItem('Current_Selected_Date_Add_appt')
      if(emptyTime($('#time1')) && date == ''){
          document.getElementById('warning_alert').innerHTML += 'Please select date and time'; 
          thereIsError = true;
      }
      else if(emptyTime($('#time1'))){
        document.getElementById('warning_alert').innerHTML += 'Please select time'; 
        thereIsError = true;
      }
      else if(date == ''){
        document.getElementById('warning_alert').innerHTML += 'Please select date'; 
        thereIsError = true;
      }
      if(thereIsError === true){
          e.preventDefault();
          $('#Servandtime').css('margin-top','.3em');
          $(this).attr('target','my_iframe')
          $('#warning_alert').css('display', 'block');
      }
      else{
        $(this).attr('target','my_iframe')
        $('#Servandtime').css('margin-top','.3em');
        $('#success_alert').html('Appointment Added Successfully');
        $('#success_alert').css('display', 'block');
      }
  })
  </script>
</html>
