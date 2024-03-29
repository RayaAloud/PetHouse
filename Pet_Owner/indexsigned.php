<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <!--Meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

  <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="../Images/favicon_io/site.webmanifest">
  <!--Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!--External CSS-->
  <link rel="stylesheet" href="../Styles/index.css">
  <!--jQuery-->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!--Embedded CSS-->
  <!--
  <style>
    body{
      overflow-x: hidden;
    }
    #sub{
      background-image: url('Images/PinkPath.png');
      background-size:cover;
      z-index: -1;
      position: absolute;
      margin-right: -3em;
      margin-top: -8em;
      height: inherit;
      margin-left: auto;
      width: 65%;    
    }
    #container{  
      justify-content: space-around;  
    }
    #container img{
      width: 500px;
      height: 500px;
    }
    #textDiv{
      flex-direction: column;
      align-self: center;
      
    }
    .titles{
      color: #1a2350;
      
    }
    #join-us-Btn{
      border: none;
      color: white;
      background-color: #111B47;
      padding: 3px 2em 3px 2em;
      width: 8em;
      align-self: center;
      margin-top: 2em;

    }
    #about-us-img{
      width: 400px;
      height: 400px;
    }
    #locationContainer{
      background-color: #BAE3F4;
      height: 450px;
      padding-top: 1em;
      margin-top: 5em;
      display: flex;
      color: #111B47;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    #locationIcon{
      font-size: 5em;
      color:#37447E;
    }
    #location{
      color:#37447E;
    }
    #bcPinkPath{
      position: absolute;
      top: -3em;
      right: -15em;
      filter: saturate(160%);
      z-index: -1;
      width: 1030px;
      height: 105vh;

    }
    #ServicesList{
       height: 400px;
       display: flex;
       overflow: auto;
       max-width: 1150px;
   }
   .cards{
       margin-top: 1em;
       box-shadow: 1px 1px 15px 1px #ebebeb;
       min-width: 250px;
       height: 290px;
       margin-right: 1.5em;
       margin-left: 1em;
       display: flex;
       align-items: center;
       padding: 0.8em;
       justify-content: center;
       text-align: center;
       flex-direction: column;
   }
   .cards p{
       margin-top: 2em;
       color: #737ca7;
       font-weight: bold;
   }
   .cards:hover{
       cursor:pointer;
   }
   .next-previous{
       background-color: transparent;
       border: none;
       font-size: 1.5em;
       color: #6e6e6e;
   }
   .next-previous:hover{
       cursor: pointer;
       background-color: #dbdbdb;
       border-radius: 35px;
   }
   @media screen and (max-width: 991px) {
       #menu{
           max-width: 170px;
       }
   }
    footer{
      background-color: #ECEFF9;
      padding: 4em 6em 1em 6em;
      display: flex;
      flex-direction: column;
    }
    footer h6{
      color: #192453;
    }
    #copyRight{
      color: #808080;
      font-size: 14px;
      margin: auto;
    }
  
    
  </style>
  -->
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
      showPage('Signed_In_Header.php', 'header');
    })
</script>
</head>
<body>
  
  <span id="header"></span>

    <img src="../Images/PinkPath.png" id="bcPinkPath">
    <div id="container" class="d-flex flex-lg-row flex-column p-sm-5 p-lg-5">
      <div id="textDiv" class="d-flex">
          <p><strong>Introduce Your Product Quickly & Effectively</strong></p>
          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
            Aenean commodo<br> ligula eget dolor. Aenean massa. 
            Cum sociis natoque penatibus <br>et magnis dis parturient montes, 
            nascetur ridiculus 
          </p>
      </div>
      <img src="../Images/undraw_friends_r511.png" class="align-self-sm-center">
    </div>
    
    <div class="container pt-5 mt-5" id="aboutus">
      <h1 class="text-center titles mt-4">About us</h1>
      <div class="d-flex pt-5 mt-3 justify-content-around">
        <div class="align-self-center">
        <p><strong>Light, Fast & Powerful</strong></p>
        <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
            Aenean commodo<br> ligula eget dolor. Aenean massa. 
            Cum sociis natoque penatibus <br>et magnis dis parturient montes, 
            nascetur ridiculus 
        </p>
        </div>
        <img src="../Images/undraw_searching.png" id="about-us-img">
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
      <h6 class="m-auto">PetHouse</h6>
      <hr>
      <span id="copyRight">&#169; 2022 PetHouse</span>
    </footer>

</body>
<?php include '../PHP/index.php'?>
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
</html>