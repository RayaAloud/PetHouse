<!DOCTYPE html>
<?php session_start()?>
<html>
<head>
  <!--Meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!--jQuery-->
  
  <!--Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!--External CSS-->
  <link rel="stylesheet" href="Styles/Header.css">
  <!--Scripts-->
  <script>
    function checkMediaQuery() {
        if (window.innerWidth < 992) {         
        }
        else{
          document.getElementById("closebtn").click() 
        }
    }
      $(document).ready(function() {
          checkMediaQuery();
      });
      window.addEventListener('resize', checkMediaQuery);

  </script>
</head>
<body>

  <header id="headerContainer">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <div class="d-flex">
          <a class="navbar-brand" href="indexsigned.php"><img src="../Images/Logo.png" id="Logo"></a>
          <div id="verticalLine" class="ml-lg-2 ml-sm-1"></div>
          <h4>PetHouse</h4>
        </div>
          <div class="collapse navbar-collapse mt-3" id="navbarNav">
            <ul class="navbar-nav h6 p-0">
              <li class="nav-item">
                <a class="nav-link nav-li nav-li" href="indexsigned.php">Home&nbsp;</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-li" href="indexsigned.php#aboutus">About us&nbsp;</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-li" href="indexsigned.php#services">Services&nbsp;</a>
              </li>
            </ul>
          </div>
          <div id="User-Icon-Container">
              <div id="User-Icon-subContainer">
                <?php
                   include 'PHP/Connection.php';
                   $connection = mysqli_connect(host,Username,Password,db);
                   if(!$connection)
                   die();
                   $result = mysqli_query($connection,"SELECT Profile_Photo FROM Pet_Owner WHERE Email ='".$_SESSION['email']."';");
                   $result = mysqli_fetch_array($result);
                   if($result > 0){
                     if($result['Profile_Photo'] == null)
                      echo "<img src='../Images/undraw_profile_pic_ic.png' id='UserIcon' alt='Profile Photo'>";
                     else
                      echo "<img src='data:image/png;charset=utf8;base64,".base64_encode($result['Profile_Photo'])."' id='UserIcon' alt='Profile Photo'>";
                   }
                ?>
                <span id="triangle">&#9662;</span>
              </div>
              <nav>
                <ul>
                  <li>
                    <i class="bi bi-person-circle User-nav-items-icons"></i>
                    <a href="Profile.php" class="User-nav-items">My Profile</a>
                  </li>
                
                  <li>
                    <i class="bi bi-grid-1x2-fill User-nav-items-icons"></i>
                    <a href="Dashboard.php" class="User-nav-items">Dashboard</a>
                  </li>
      
                  <li id="logout-tab">
                    <i class="bi bi-box-arrow-right User-nav-items-icons"></i>
                    <a href="PHP/Sign_out.php" class="User-nav-items">Logout</a>
                  </li>
                </ul>
              </nav>
          </div>
          <button class="navbar-toggler float-left mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation" id="sidemenu-btn">
            <span class="navbar-toggler-icon">&#9776;</span>
          </button>
      </div>


   <!---------------Canvas---------------->
   <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="closebtn"></button>
    </div>
    <div class="offcanvas-body navbar-light text-center"> 
      <a class="navbar-brand " href="#"><img src="../Images/Logo.png" id="Logo"></a>
      <ul class="container navbar-nav h6 fw-1 text-center mt-5">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <span class="dropdown-divider col-6 m-auto"></span>
        <li class="nav-item">
          <a class="nav-link"  href="#">About us</a>
        </li>
        <span class="dropdown-divider col-6 m-auto"></span>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
      </ul> 
    </div>
  </div>
   <!--------------------------------------> 
  </nav>
</header>
</body>
</html>