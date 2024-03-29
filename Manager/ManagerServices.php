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
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
function show(btn){
    showPage('UpdateService.php','addService');
    var service_name = btn.parentNode.parentNode.childNodes[2].innerHTML;
    var service_price = btn.parentNode.parentNode.childNodes[3].innerHTML;
    var service_Desc = btn.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].innerHTML;
    var service_img = btn.parentNode.parentNode.childNodes[1].getAttribute('src');
    console.log(service_Desc);
    sessionStorage.setItem('ServiceToBeEdited_Name',service_name); 
    sessionStorage.setItem('ServiceToBeEdited_Price',parseInt(service_price)); 
    sessionStorage.setItem('ServiceToBeEdited_Description',service_Desc);
    sessionStorage.setItem('ServiceToBeEdited_Image',service_img);     
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
          <!--Services here..--> 
          </div>
        </div>
        <button id="next" class="next-previous"><i class="bi bi-chevron-right"></i></button>
      </div>
      
      <div id="addService" class="col-9"></div>
    </div> 
    <button id="addServiceBtn" class="" onclick="showPage('AddService.php','addService')">Add New Service</button>
    <?php include 'PHP/Retrieve_Services.php'?>
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
    <script>
       var deleteBtns = document.getElementsByClassName('DeleteBtn');
       for(let i = 0; i<deleteBtns.length; i++){
         $(deleteBtns[i]).click(function(){
          let name = deleteBtns[i].parentNode.parentNode.childNodes[2].innerHTML;
          $.ajax({
            url: 'PHP/Delete_Service.php',
            method: 'POST',
            data: {ServiceName : name}
        }).done(function( msg ) {
         alert( "Data Saved: " + msg );
        });
       })
      }
      function cancel(){
        $('#addService').html("");
      } 
  </script>
 </body> 
</html>