<!DOCTYPE html>
<html>
<head>
  <title>Request Appointment</title>
  <!--Meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Images/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Images/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="Images/favicon_io/site.webmanifest">
  <!--Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!--External CSS-->
  <link rel="stylesheet" href="Styles/Appointment_Options.css">
  <!--jQuery-->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
  
   $(document).ready(function(){
     
   })
   
  </script>
</head>
<body>

    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div id="pet" class="col-6 d-flex justify-content-around align-items-center">
            <div>
                <img src="Images/catBabyBlue.png" class="mr-5">
                <span>&nbsp;</span>
                <label for="petsList">Pet</label>
            </div>
            <select id="petsList">
                
            </select>
        </div>
        <div class="d-flex align-items-center mt-4">
            <button id="previous" class="next-previous mr-5"><i class="bi bi-chevron-left"></i></button>     
        <div>
            <div id="ServicesList" class="mt-5">
                
            </div>
        </div>
        <button id="next" class="next-previous"><i class="bi bi-chevron-right"></i></button>
        </div>
       
    </div>
    <?php include 'PHP/Appointment_Options.php' ?>
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