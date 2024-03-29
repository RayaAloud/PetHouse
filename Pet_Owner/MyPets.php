<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../index.php");
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My Pets</title>
        <link rel="stylesheet" href="Styles/styleMyPets.css">
        <!--AJAX-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--Favicon-->
        <link rel="icon" type="/image/x-icon" href="../images/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon_io/favicon-16x16.png">
        <link rel="manifest" href="../Images/favicon_io/site.webmanifest">
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!--Thin font-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <!--Bold font-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <!--Bootstrap Icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
                showPage('Signed_In_Header.php','header')
            })
        
        </script>
    </head>
    
    <body class="MyPetPage">
        <span id="header"></span>
        <img src="../Images/Vector.png" id="bcImg1">
        <img src="../Images/designer_1.png" id="bcImg2">
        <div class="frame div">
           <p>
           <h2 id="MyPet-Listing">My Pets</h2>
           <a class="anchors" href="AddPet.php"><button id="addNew" type="button" class="btns">Add New</button></a>
          </p>
          
          <ul class="ul">
              <li> <!-- need to be fixed -->
                  <div class="petList div" id="1">
                    <div class="p-3"> 
                       <span id="deletedit"><h6 class="delete"> <button id="deleteBtn"><i class="bi bi-trash3"></i>&nbsp;Delete</button></h6>
                       <h6 class="edit"><button id="editBtn"> <i class="bi bi-pencil"></i>&nbsp;Edit</button></h6>
                       </span>
                       <div class="d-flex align-items-center mb-3">
                        <img src="../Images/catPurple.png" width="50px" height="50px">
                        <span>&nbsp;&nbsp;</span>
                        <h4 class="petName">Java</h4>
                     </div>
                      
                      <table>
                          <tr>
                              <td>Pet Name</td>
                              <td>Java</td>
                          </tr>
                          <tr>
                              <td>Date of Birth</td>
                              <td>2/2/2022</td>
                          </tr>
                          <tr>
                              <td>Gender</td>
                              <td>Male</td>
                          </tr>
                          <tr>
                              <td>Breed</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Status</td>
                              <td></td>
                          </tr>
                      </table>
                       </div>
                       <hr>
                       <!--ACCORDION-->
                       <h5 class="accordion"><i class="bi bi-chevron-down"></i></h5>
                       <div class="panel div">
                         <p>Lorem ipsum...</p>
                       </div>
                  </div>
              </li> 
              <li>
                 <div class="petList div">
                    <div class="p-3"> 
                        <span id="deletedit"><h6 class="delete"> <button id="deleteBtn"><i class="bi bi-trash3"></i>&nbsp;Delete</button></h6>
                        <h6 class="edit"><button id="editBtn"> <i class="bi bi-pencil"></i>&nbsp;Edit</button></h6>
                       </span>
                       <div class="d-flex align-items-center mb-3">
                        <img src="../Images/catBabyBlue.png" width="50px" height="50px">
                        <span>&nbsp;&nbsp;</span>
                        <h4 class="petName">Loly</h4>
                     </div>
                      <table>
                        <tr>
                            <td>Pet Name</td>
                            <td>Loly</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>25/4/2021</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>Female</td>
                        </tr>
                        <tr>
                            <td>Breed</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <hr>
                    
                     <!--ACCORDION-->
                     <h5 class="accordion"><i class="bi bi-chevron-down"></i></h5>
                     <div class="panel div">
                       <p>Lorem ipsum...</p>
                     </div>
                  </div>
              </li> 
              <li>
                <div class="petList div">
                    <div class="p-3"> 
                        <span id="deletedit"><h6 class="delete"> <button id="deleteBtn"><i class="bi bi-trash3"></i>&nbsp;Delete</button></h6>
                            <h6 class="edit"><button id="editBtn"> <i class="bi bi-pencil"></i>&nbsp;Edit</button></h6>
                        </span>
                        <div class="d-flex align-items-center mb-3">
                        <img src="../Images/catPurple.png" width="50px" height="50px">
                        <span>&nbsp;&nbsp;</span>
                        <h4 class="petName">Roy</h4>
                        </div>
                        <table>
                            <tr>
                                <td class="properity">Pet Name</td>
                                <td class="data">Roy</td>
                            </tr>
                            <tr> 
                                <td class="properity">Date of Birth</td>
                                <td class="data">8/1/2022</td>
                            </tr>
                            <tr>
                                <td class="properity">Gender</td>
                                <td class="data">Male</td>
                            </tr>
                            <tr>
                                <td class="properity">Breed</td>
                                <td class="data"></td>
                            </tr>
                            <tr>
                                <td class="properity">Status</td>
                                <td class="data"></td>
                            </tr>
                        </table>
                    </div>
                     <hr>
                     <!--ACCORDION-->
                     <h5 class="accordion"><i class="bi bi-chevron-down"></i></h5>
                     <div class="panel">
                       <p>Lorem ipsum...</p>
                     </div>
                </div>
              </li>
          </ul>
        </div>
     </span>
     <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
              panel.style.display = "none";
            } else {
              panel.style.display = "block";
            }
          });
        }
        </script>
    </body>
</html>