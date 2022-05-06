<!DOCTYPE html>
<?php
if(isset($_SESSION['email']))
 header("Location: Pet_Owner/Dashboard.php");
?>
<html>
<head>
  <title>Home</title>
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
  <!--jQuery-->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!--External CSS-->
  <link rel="stylesheet" href="Styles/index.css">
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
                document.getElementById(elem).innerHTML = request.responseText;
          }

          request.open("Get", page, true);
          request.send();
      }

    $(document).ready(function(){
      showPage('Unsigned_In_Header.html', 'header');
    })
</script>

</head>
<body>

  <span id="header"></span>
    <img src="Images/PinkPath.png" id="bcPinkPath">
    <div id="container" class="d-flex flex-lg-row flex-column p-sm-5 p-lg-5">
      <div id="textDiv" class="d-flex">
          <p><strong>Your pet is our first priority!</strong></p>
          <p>
            We have the most talented vetrinerians to make your pet
            <br> the prettiest and most groomed pet in the world
           <br>Feel good, your pet is at good hands.
          </p>
          <a class="text-decoration-none" href="signup.php"><button id="join-us-Btn">Sign up now!</button></a>
    
      </div>
      <img src="Images/undraw_friends_r511.png" class="align-self-sm-center">
    </div>

    <div class="container pt-5 mt-5" id="aboutus">
      <h1 class="text-center titles mt-4">About us</h1>
      <div class="d-flex pt-5 mt-3 justify-content-around">
        <div class="align-self-center" id="AboutUsText">
          <p><strong>From a pet owner, to a pet service provider</strong></p>
          <p>
              We saw what pet owners suffer from, as we are one of them,<br>
              having to wait in a pet clinic for hours is really time consuming <br>
              so we said why don't we as software engineers make things easier for all of our pet friends?
              <br> Now we serve over 400 clients that are very happy with the smooth appointments.
          </p>
        </div>
        <img src="Images/undraw_searching.png" id="about-us-img">
      </div>
    </div>
    <div class="container pt-5 mt-3 d-flex flex-column align-items-center text-center" id="services">
      <h1 class="text-center titles">Our Services</h1>
      <div class="d-flex align-items-center mt-5">
        <button id="previous" class="next-previous"><i class="bi bi-chevron-left"></i></button>
    <div>
        <div id="ServicesList" class="mt-5">
            
        </div>
    </div>
    <button id="next" class="next-previous"><i class="bi bi-chevron-right"></i></button>
    </div>
    </div>

    <div id="locationContainer">
      <h4>A Price To Suit Everyone</h4>
      <p class="text-center mt-3 mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <br> Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque<br> penatibus et magnis dis parturient montes, nascetur ridiculus </p>
      <i class="bi bi-geo-alt-fill mt-3" id="locationIcon"></i>
      <p id="location">Saudi Arabia, Riyadh</p>
    </div>

    <footer>
      <div class="">
        <a class="contact text-decoration-none" href="tel:966544705344"><i class="bi bi-telephone-fill"></i></a>
        <span>&nbsp;</span>
        <a class="contact text-decoration-none" href="mailto:petHouse.coo@mail.com"><i class="bi bi-envelope-fill"></i></a>
      </div>
      <h6 class="m-auto">PetHouse</h6>
      <hr>
      <span id="copyRight">&#169; 2022 PetHouse</span>
    </footer>
    <?php include 'PHP/index.php'?>
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
