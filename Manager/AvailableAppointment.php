<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Appointments</title>
    <!--External CSS-->
    <link rel="stylesheet" href="Style/AvailableApt.css">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
     <!--AJAX-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Script-->
    <script>
        
    </script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker({
            onSelect: function(){var currentDate = $( "#datepicker" ).datepicker( "getDate" )
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
            .ui-datepicker-month, .ui-datepicker-year{
                color: white;
            } 
        </style>
</head>
<body>
    <span id="header"></span>
    <div class="mb-4 mt-5">
        <div class="available-apt col-10 d-flex justify-content-between" id="topContainer">
            <div class="col-10">
                <p>Available Appointments</p>
                <div class="line"></div>
            </div>
            <button type="button" class="justify-self-end" id="Add" onclick="showPage('AddAppointment.php','content')">+</button>
        </div>
        <!--table-->
     <div class="box mb-4 mt-5">
        <table>
            <thead>
            <tr>
                <th class="text-center pt-4 pb-2">Service</th>
                <th class="text-center pt-4 pb-2">Date</th>
                <th class="text-center pt-4 pb-2">Time</th>
                <th class="text-center pt-4 pb-2"></th>
            </tr>
            </thead>
            <tbody>
            <!--Available Appointments Here--> 
            </tbody>
        </table> 
     </div>
  </div>
 <?php include 'PHP/Retrieve_Available_Apppointments.php' ?>
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
    
        var editBtns = document.getElementsByClassName('editBtn');
        for(let i = 0; i < editBtns.length; i++){
            $(editBtns[i]).click(function(){
                let apptID = editBtns[i].parentNode.parentNode;
                apptID = $(apptID).attr('id');
                showPage('UpdateAppointment.php?ID='+apptID,'content');
            })
           
        }
    </script>
</body>
</html>