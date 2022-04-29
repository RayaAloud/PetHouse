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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--Icons-->
    <script src="https://kit.fontawesome.com/e920294da5.js" crossorigin="anonymous"></script>
     <!--AJAX-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--External CSS-->
    <link rel="stylesheet" href="Style/Add_Service.css">
</head>
<body>
    <div class="container d-flex flex-column offset-1">
      <form id="form" method="post" enctype="multipart/form-data">
        <div class="container d-flex justify-content-between">
        <div class="d-flex flex-column" id="inputFields">
        <div class="row">
            <label>Service Name</label>
            <input type="text" value="Checkup" name="service" id="service">
        </div>
        <div class="row">
            <label>Service Price</label>
            <input type="number" value="180" name="price" id="price">
        </div>
        <div class="row">
            <label>Description</label>
            <textarea name="Description" id="Description">This service includes full check up for your pet with our excellent veterinaries</textarea>
        </div>
        </div>
        <div class="d-flex flex-column justify-content-center">
            <div id="addinPic" class="d-flex flex-column">
                <img id="pet-image" src="../images/bath.png" alt="pet picture" width="100px" height="100px">
                <input type="file" id="imgUpload" name="photo">
                <label for="imgUpload" class="align-self-end"><i class="fa fa-square-pen" id="plusS"></i></label>
             </div>
        </div>
        </div>
        <div class="container d-flex justify-content-center mt-5"><button id="AddBtn">Update Service</button></div>
        </form>
    </div>
</body>
<script>
    $('#imgUpload').change(function(){
        document.getElementById('pet-image').src = window.URL.createObjectURL(this.files[0]);
    }) 
    $('#form').submit(function(event){
        let name = sessionStorage.getItem('ServiceToBeEdited'); 
            event.preventDefault();
            let img = new FormData();
            for(let i = 0; i < $('#imgUpload')[0].files.length; i++){
               img.append('img', $('#imgUpload')[0].files[i]);
            }   
            $.ajax({
            method: 'POST',
            url: 'PHP/Edit_Service.php',
            enctype: 'multipart/form-data',
            data: {name : $('#service').val(), price : $('#price').val(), description : $('#Description').val(),oldName : name},
            }).done(function(msg){
            alert(msg);
        })
        $.ajax({
            method: 'POST',
            url: 'PHP/Edit_Service.php',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: img,
        }).done(function(msg){
            alert(msg);
        })      
   })
</script> 
</html>