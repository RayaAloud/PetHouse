<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['manager_email'])){
  header("Location: ../Login.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="../Images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    <!--jQuery-->
    <script src="https://kit.fontawesome.com/e920294da5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!--External CSS-->
    <link rel="stylesheet" href="Style/Side_Menu.css">
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
    function showContent(id){
       switch(id){
         case 1:showPage('About_Us.php', 'content');
         changeTabsColor('AboutUsTab');
         break;
         case 2:showPage('ManagerServices.php', 'content');
         changeTabsColor('ServicesTab');
         break;
         case 3:showPage('AvailableAppointment.php', 'content');
         changeTabsColor('AvailableAptTab');
         break;
         case 4:showPage('AppointmentsRequests.php', 'content');
         changeTabsColor('AptReqTab');
         break;
         case 5: showPage('UpcomingAppointments.php', 'content');
         changeTabsColor('UpcomingAptTab');
         break;
         case 6:showPage('PreviousAppointment.php', 'content');
         changeTabsColor('PreviousAptTab');
         break;
         case 7:showPage('Reviews.php', 'content');
         changeTabsColor('ReviewsTab');
         break;       
       }
    }
    function changeTabsColor(id){
        var arr = document.getElementsByClassName('tabs');
        for(var i = 0; i<arr.length; i++){
         arr[i].style.backgroundColor = 'transparent';
        }
        document.getElementById(id).style.backgroundColor = '#8a94bd';
    }
    $(document).ready(function(){   
     showPage('About_Us.php', 'content');
   })
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
    <div class="container d-flex" id="Container">
        <div class="">
            <div class="container d-flex flex-column align-items-center col-lg-12 col-xl-12 px-0 pt-2 h-100" style="padding-top: 25px; background-color: #A2ABD1; ">
                <div class="container d-flex flex-column align-items-sm-start align-items-md-center pt-5 text-white min-vh-100" >
                    <a href="#" class="container d-flex pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="ml-5 container fs-5 d-none d-sm-inline justify-self-center" ><img src="../Images/Logo.png" width="100px" height="100px" alt="PetHouse Logo" id="Logospan"></span>
                    </a>
                    <ul class="container nav nav-pills d-flex flex-column mb-sm-auto mb-0  align-items-sm-start" style="padding-top: 50px;"  id="menu">
                        
                        <li class="p-3 d-flex align-items-center tabs container" onclick="showContent(1)" id="AboutUsTab">
                            <a href="#" class="text-decoration-none align-middle px-0 sideMenuColor">
                                <i class="fa-solid fa-address-card"></i><span class="ms-1 d-none d-sm-inline"> About us</span>
                            </a>
                        </li>

                        <li class="p-3 d-flex align-items-center tabs container" onclick="showContent(2)" id="ServicesTab">
                            <a href="#" class="text-decoration-none align-middle px-0 sideMenuColor">
                                <i class="fa-solid fa-hand-holding-heart"></i><span class="ms-1 d-none d-sm-inline"> Services</span>
                            </a>
                        </li>
                        
                        <li class="p-3 d-flex align-items-center tabs container" onclick="showContent(3)" id="AvailableAptTab">
                            <a href="#" class="text-decoration-none px-0 align-middle sideMenuColor">
                                <i class="fa-solid fa-calendar-check"></i> <span class="ms-1 d-none d-sm-inline"> Available Apponintments</span></a>
                        </li> 
                        
                        <li class="p-3 d-flex align-items-center tabs container" onclick="showContent(4)" id="AptReqTab"> 
                            <a href="#" class="text-decoration-none px-0 align-middle sideMenuColor">
                                <i class="fa-solid fa-calendar-day"></i> <span class="ms-1 d-none d-sm-inline"> Apponintment Requests</span> </a>
                                
                        </li>
                       
                        <li class="p-3 d-flex align-items-center tabs container"  onclick="showContent(5)" id="UpcomingAptTab">
                            <a href="#" class="text-decoration-none px-0 align-middle sideMenuColor">
                                <i class="fa-solid fa-calendar-week"></i> <span class="ms-1 d-none d-sm-inline"> Upcoming Apponintments</span>
                            </a>
                        </li>

                        <li class="p-3 d-flex align-items-center tabs container"  onclick="showContent(6)" id="PreviousAptTab">
                            <a href="#" class="text-decoration-none px-0 align-middle sideMenuColor">
                                <i class="fa-solid fa-calendar-days"></i><span class="ms-1 d-none d-sm-inline"> Previous Apponintments</span>
                            </a>
                        </li>

                        <li class="p-3 d-flex align-items-center tabs container" onclick="showContent(7)" id="ReviewsTab">
                            <a href="#" class="text-decoration-none px-0 align-middle sideMenuColor">
                                <i class="fa-solid fa-comments"></i> <span class="ms-1 d-none d-sm-inline"> Reviews</span> 
                            </a>           
                        </li>
                    </ul>
                     <a class="text-decoration-none mb-5 mt-5" href="PHP/Sign_out.php"><button id="logoutBtn">Logout</button></a>
                </div>
            </div>
        </div>
        <div id="content"></div>
        <img src="../Images/designer_1.png" id="bcImg3">
    </div>
</body>
</html>