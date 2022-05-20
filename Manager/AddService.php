<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!--jQuery-->
     <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
     <!--External CSS-->
     <link rel="stylesheet" href="Style/Add_Service.css">
     <script src="Forms_Validations.js"></script>
    <script>
        $('#imgUpload').change(function(){
            document.getElementById('pet-image').src = window.URL.createObjectURL(this.files[0]);
        })
    </script>   
</head>
<body>
    <div class="form-container d-flex flex-column offset-2">
        <iframe id="iframe" name="my_iframe"></iframe>
        <div class='alert alert-danger' role='alert' id="error_alert" style="display: none"></div>
        <div class="alert alert-success" id="success_alert" role="alert" style="display: none"></div>
        <form method="POST" action="PHP/Add_Service.php" enctype="multipart/form-data" target="my_iframe" id="add_service_form">
        <div class="container d-flex justify-content-between">
        <div class="d-flex flex-column" id="inputFields">
        <div class="row">
            <label>Service Name</label>
            <input type="text" name="ServiceName" id="service_name" required>
        </div>
        <div class="row">
            <label>Service Price</label>
            <input type="number" name="Price" id = "price" required>
        </div>
        <div class="row">
            <label>Description</label>
            <textarea name="Description" id="Description" class="p-3" required></textarea>
        </div>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-end">
            <div id="addinPic" class="d-flex flex-column">
                <img id="pet-image" src="../Images/bath.png" alt="pet picture" width="100px" height="100px">
                <input type="file" id="imgUpload" name="Photo">
                <label for="imgUpload" class="align-self-end"><i class="bi bi-plus-circle-fill" id="plusS"></i></label>
             </div>
        </div>
        </div>
        <div class="col-6 d-flex m-auto justify-content-around mt-5">
            <button class="cancelBtn" type="button" onclick="cancel()">Cancel</button>
            <button id="AddBtn" type="submit" name="add">Add Service</button>
        </div>
      </form>
    </div>
</body>
    <script>
      $('#add_service_form').submit(function(e){
          $('#error_alert').html("");
          $('#error_alert').css('display', 'none');
          $('#success_alert').html("");
          $('#success_alert').css('display', 'none');
          $.ajax({
              url: 'PHP/Check_Services.php',
              method: 'POST',
              async: false,
              data: {service_name : $('#service_name').val()}
          }).done(function(msg){
             if(msg == 0)
                sessionStorage.setItem('service_exists', 0);
             else if(msg == 1){
                sessionStorage.setItem('service_exists', 1);
             }
          })
          var img = document.getElementById('imgUpload');
          var serviceExists = sessionStorage.getItem('service_exists');
          var thereIsError = false;
          if(serviceExists == 1)
            document.getElementById('error_alert').innerHTML += '&#9679; Service Exists!<br>';
          if(isnegativeNumber($('#price').val())){
            document.getElementById('error_alert').innerHTML += '&#9679; Price Cannot be negative!<br>'; 
            thereIsError = true;
          }
          if(emptyImage(img)){
            document.getElementById('error_alert').innerHTML += '&#9679; Service photo is required<br>'; 
            thereIsError = true;
          }
          if((serviceExists == 1) || (thereIsError === true)){
             e.preventDefault();
             $('#error_alert').css('display', 'block');
          }
          else{
             $('#success_alert').html('Service Added Successfully');
             $('#success_alert').css('display', 'block');
          }
             
          
      })
    </script>
</html>