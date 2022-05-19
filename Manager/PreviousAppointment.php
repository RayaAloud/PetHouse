<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Appointments</title>
    <!--External CSS-->
    <link rel="stylesheet" href="Style/Appointment.css">
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
      #div{
        
        display: block;
      }
      #divCont{
        box-shadow: 1px 1px 15px 1px #ebebeb;
        width: 400px;
        min-height:250px;
        z-index: 3;
        padding: 1.5em;
        position: absolute;
        background-color: white;
        left: 20em;
        top: 5em;

      }
      #cancelBtn{
        border: none;
        background: none;
        position: relative;
        margin-top: -1em;
      }
      #div table{
        display: inline;
      }
    </style>
    <script>

      function show(){
          document.getElementById("div").style.display ='block';
       }
       function closeDiv(){
          document.getElementById("div").style.display ='none';
       }
       
 
 </script>
</head>
<body>
  <!-- <div id="div">
    <div id="divCont" class="d-flex flex-column align-items-center m-auto">
      <button id="cancelBtn" class="align-self-end" onclick="closeDiv()">X</button>
      <div class="d-flex">
      <table>
        <tr>
          <th>Pet Name</th>
          <td>Java</td>
        </tr>
        <tr>
          <th>Date of Birth</th>
          <td>4/4/2021</td>
        </tr>
        <tr>
          <th>Gender</th>
          <td>Male</td>
        </tr>
        <tr>
          <th>Breed</th>
          <td>Domestic short-haired</td>
        </tr>
        <tr>
          <th>Status</th>
          <td>Alive</td>
        </tr>
        <tr>
          <th>Medical History</th>
          <td>Allergic</td>
        </tr>
      </table>
      <img src="../Images/catBabyBlue.png" width="70px" height="70px" class="align-self-center">
    </div>
    </div>
  </div> -->
    <div class="mb-4">
        <div class="upcoming-apt">
          <p>Previous Appointments</p>
        <div class="line"></div>
      </div>
      <div class="box mb-5">
       <table id="table">
      
          <thead>
          <tr>
            <th class="text-center pt-4 pb-2">Pet</th>
            <th class="text-center pt-4 pb-2">Service</th>
            <th class="text-center pt-4 pb-2">Date</th>
            <th class="text-center pt-4 pb-2">Time</th>
            <th class="text-center pt-4 pb-2">Notes</th>
          </tr>
          </thead>
      
          <tbody>
            <!-- <tr >
              <td><img class="t-img" src="../Images/catPurple.png" alt=""></td>
              <td>Checkup</td>
              <td>27/1/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"></i></button> </td>
            </tr>
      
            <tr>
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/10/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"> </button></td>
            </tr>
      
            <tr>
              <td><img class="t-img" src="../Images/catPurple.png" alt=""></td>
              <td>Checkup</td>
              <td>14/11/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"></button></td>
            </tr>
      
            <tr>
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/2/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"><i class="bi bi-chat-square-dots-fill noteIcon"></i></button></td>
            </tr>
            <tr>
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/2/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"></i></button></td>
            </tr>
         
            <tr>
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/2/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"><i class="bi bi-chat-square-dots-fill noteIcon"></i></button></td>
            </tr> -->
          
          </tbody>
        </table>
       </div>
 
</body>
<?php include'PHP/RetrievePrevious.php'?>
</html>