<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <!--External CSS-->
    <link rel="stylesheet" href="Style/styleAboutUs.css">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </head>
<body>
  
    <div id="container" class="w-100 container">
     <form method="POST" action="PHP/About_us.php" class="container" enctype="multipart/form-data">
        <h3 class="d-inline titles"><i class="bi bi-image-fill"></i>&nbsp;&nbsp;Photo</h3>  
        <div class="col-9 mb-5 mt-5 d-flex justify-content-between">
            <div id="UpdatePhoto" class="justify-self-start"><label for="PhotoInput">Change Photo</label><input type="file" id="PhotoInput" name="photo"></div>
            <img src="Images/undraw_searching.png" height="150px" id="aboutus-img">
       </div>
        <div class="">
            <h3 class="d-inline titles"><i class="bi bi-file-text"></i>&nbsp;&nbsp;Description</h3>
            <div class="d-flex container justify-content-between">
              <input type="text" class="inputs" name="description" id="desc" required>
            </div>
        </div>
        <div class="mt-5">
            <h3 class="d-inline titles"><i class="bi bi-geo-alt-fill"></i>&nbsp;&nbsp;Location</h3>
            <div class="d-flex container justify-content-between">
              <input type="text" class="inputs" name="location" id="loc" required>
            </div>   
        </div>  
        <div class="container d-flex justify-content-center mt-5">
          <input type="submit" id="saveBtn" class="mt-5" name="save" value="Save Changes"></button>
        </div>
    </form>
 </div>  
 <?php include 'PHP/About_us.php' ?>
</body>
<script>
        $('#PhotoInput').change(function(){ 
            document.getElementById('aboutus-img').src = window.URL.createObjectURL(this.files[0]);
        })
    </script>
</html>