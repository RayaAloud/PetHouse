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
    <script src="Pet_Profile.js"></script>
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
      #note-container{
        display: none;
        position: absolute;
        box-shadow: 1px 1px 15px 1px #ebebeb;
        background-color: white;
        left: 55%;
        top: 8vh;
        width: 400px;
        min-height:200px;
        z-index: 3;
      }
      #note-content{  
        padding: 1.5em;
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
      function showNote(btn){
         var appointmentID = $(btn).parent().parent().attr('id');
         $.ajax({
           url: 'PHP/Retrieve_Notes.php',
           method: 'POST',
           data: {Appt_ID : appointmentID},
         }).done(function(msg){
           $('#note').html(msg);
           $('#note-container').css('display', 'block');
         })  
      }
      function closeNote(){
         document.getElementById("note-container").style.display ='none';
      }
      function showPetProfile(btn){
         var appointmentID = $(btn).parent().parent().attr('id');
         $.ajax({
           url: 'PHP/Retrieve_Pet_Profile.php',
           method: 'POST',
           dataType: 'JSON',
           data: {Appt_ID : appointmentID},
         }).done(function(msg){
           $('#pet-name').html(msg[0].Pet_Name);
           $('#pet-dob').html(msg[0].DOB);
           $('#pet-gender').html(msg[0].Gender);
           $('#pet-breed').html(msg[0].Breed);
           $('#pet-status').html(msg[0].Status);
           $('#pet-MH').html(msg[0].Medical_History);
           $('#pet-VL').html(msg[0].Vaccination_list);
           $('#pet-photo').attr('src','data:image/png;charset=utf8;base64,'+msg[0].Photo);
           $('#Pet-Profile').css('display', 'block');
         })  
      }
      function closePetProfile(){
         document.getElementById("Pet-Profile").style.display ='none';
      }
</script>
</head>

<body>
<div id="Pet-Profile">
    <div id="Profile-content" class="d-flex flex-column align-items-center m-auto">
      <button id="cancelBtn" class="align-self-end" onclick="closePetProfile()">X</button>
      <div class="d-flex">
      <table>
        <tr>
          <th>Pet Name</th>
          <td id="pet-name"></td>
        </tr>
        <tr>
          <th>Date of Birth</th>
          <td id="pet-dob"></td>
        </tr>
        <tr>
          <th>Gender</th>
          <td id="pet-gender"></td>
        </tr>
        <tr>
          <th>Breed</th>
          <td id="pet-breed"></td>
        </tr>
        <tr>
          <th>Status</th>
          <td id="pet-status"></td>
        </tr>
        <tr>
          <th>Medical History</th>
          <td id="pet-MH"></td>
        </tr>
        <tr>
          <th>Vaccination List</th>
          <td id="pet-VL"></td>
        </tr>
      </table>
      <img id="pet-photo" src="../Images/catBabyBlue.png" width="70px" height="70px" class="align-self-center">
    </div>
    </div>
    </div>
<div id="note-container">
      <div id="note-content" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeNote()">X</button>
        <h3>Note</h3>
        <p id="note"></p>
      </div>
    </div>

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
 
          
          </tbody>
        </table>
       </div>
 <?php include'PHP/Retrieve_Previous.php'?>
</body>


<script>
    function closeMsg(){
         $("#delete-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
    } 
  </script>

</html>