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
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          onSelect: function(){var currentDate = $("#datepicker").datepicker("getDate")
            document.getElementById('dateInput').value = currentDate.getFullYear() + "-" + (currentDate.getMonth()+1) + "-" + currentDate.getDate();
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
      </style>
    
</head>
    <body>
  <div id="addService">
     <h2>Add Appointment</h2>
     <div class="line"></div>
       <form method="POST" action="PHP/Add_Appointment.php">
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

</html>
