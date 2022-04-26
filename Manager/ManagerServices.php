<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!--Exetrnal CSS-->
    <link rel="stylesheet" href="Style/ManagerServices.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!--jQuery-->
     <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   
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
function show(){
  showPage('UpdateService.html','addService')
}

</script>
</head>
<body>
 
    <div class="mb-4">
        <div class="upcoming-apt">
          <p id="title">Services</p>
        <div class="line"></div>
    </div>
    
    <div class="d-flex flex-column mr-4">
      <div class="d-flex align-items-center mt-5" id="servicesContainer">
          <button id="previous" class="next-previous"><i class="bi bi-chevron-left"></i></button>     
        <div>
          <div id="ServicesList" class="mt-5">
          

            
          </div>
        </div>
        <button id="next" class="next-previous"><i class="bi bi-chevron-right"></i></button>
      </div>
      
      <div id="addService" class="col-8"></div>
    </div> 
    <button id="addServiceBtn" class="" onclick="showPage('AddService.html','addService')">Add New Service</button>
    <?php include 'PHP/Retrieve_Services.php'?>
    <script>
      var acc = document.getElementsByClassName("collap");
      var acc2 = document.getElementsByClassName("content");
      for(var i = 0; i<acc.length; i++){
        $(acc[i]).click(function(){
          this.classList.toggle('active');
          var j = 0;
          if($(acc2[j]).css('display') === "block"){
            $(acc2[j]).css('display', 'none');  
          }
          else if($(acc2[j]).css('display') === "none"){
            $(acc2[j]).css('display', 'block');    
          }
        });
        j++;
      }
    </script>
 </body> 
</html>