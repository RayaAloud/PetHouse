<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments Requests</title>
    <!--External CSS-->
    <link rel="stylesheet" href="Style/Appointment.css">
    <!--Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="Pet_Profile.js"></script>
<style>
      #cancelBtn{
        border: none;
        background: none;
        position: relative;
        margin-top: -1em;
      }
      #divv2{
        display: none;
        z-index: 3;
        position: absolute;
        background-color: white;
        width: fit-content;
      }
      #divCont2{
        box-shadow: 1px 1px 15px 2px #d8d8d8;
        width: 250px;
        min-height: 100px;
        z-index: 3;
        padding: 1em;
        padding-top: 1.5em;
      }
      #divCont2 p{
        overflow-y: scroll;
      }
      #cancelBtn2{
        border: none;
        background: none;
        position: relative;
        margin-top: -1em;
      }
      #div table{
        display: inline;
      }
      #success-confirmation{
      display: none;
      position: absolute;
      background-color: white;
      margin-left: 20%;
      margin-top: 21vh;
      z-index: 3;
    }
    #success-content-container{
      box-shadow: 1px 1px 15px 2px #d8d8d8;
      width: 400px;
      min-height: 100px;
      z-index: 3;
      padding: 2em;
    }
    #cancel_Btn{
      border: none;
      background: none;
    }
    #okButton{
      border: none;
      background-color: rgb(87, 189, 87);;
      border-radius: 50px;
      padding: 0.3em 2em 0.3em 2em;
      color: white;
      font-size: 1.2em;
    }
    #okButton:hover{
      background-color: rgb(72, 163, 72);;
    }
    #success_icon{
    color: rgb(93, 203, 93);
    font-size: 7em;
    margin-left: 0.4em;
    }
    #acc-dec-msg{
    color:rgb(35, 35, 35);
    font-weight: 300;
    }
    .noAppt{
      margin-left: 85%;
      margin-top: 5em;
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
        $('#divv2').css('top', $(btn).offset().top - 15);
        $('#divv2').css('left', $(btn).offset().left - 10);
        $('#divv2').css('display', 'block'); 
        })
      }
      function closeNote(){
          document.getElementById("divv2").style.display ='none';
      }
</script>
</head>
<body>
<div id="darkBcground"></div>
  <!--Pet Profile-->
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
    <!--Note-->
    <div id="divv2">
      <div id="divCont2" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeNote()">X</button>
        <h3>Note</h3>
        <p id="note"></p>
      </div>
    </div>
    <!--Delete Confirmation-->
    <div id="delete-confirmation">
      <div id="content-container" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeMsg()">X</button>
        <h3 class="mb-5 mt-3"><span id="action-word"></span> this appointment?</h3>
        <div id="btns-container">
            <button id="cancelButton">Cancel</button>
        </div>
      </div>
    </div>
    <!--success-->
    <div id="success-confirmation">
      <div id="success-content-container" class="d-flex flex-column align-items-center m-auto text-center">
        <button id="cancel_Btn" class="align-self-end" onclick="closeMsg2()">X</button>
        <i class="bi bi-check-circle-fill" id="success_icon"></i>
        <h4 class="mb-5 text-center" id="acc-dec-msg">Appointment Request Successfully</h4>
        <div id="btns-container">
            <button id="okButton" onclick="closeMsg2()">OK</button>
        </div>
      </div>
    </div>


    <div class="mb-4">
        <div class="upcoming-apt">
          <p>Appointments Requests</p>
        <div class="line"></div>
    </div>
      
           <!--Appointment Requests Here -->
          
       <?php include 'PHP/Retrieve_Appt_Requests.php' ?>
</body>
  <script>
    function closeMsg(){
         $("#delete-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
    }
    function decline_accept(apptID, status){  
      $.ajax({
        url: 'PHP/Accept_Decline_Appt.php',
        method: 'POST',
        data: {apptID : apptID, status : status}
        }).done(function(msg){
            closeMsg();
            $('#acc-dec-msg').html("Appointment Request "+status+" Successfully")
            $("#success-confirmation").css('display','block'); 
            $('#darkBcground').css('display','block');
        })
    }
    var apptID;
    var declineBtns = document.getElementsByClassName('decline');
        for(let i = 0; i < declineBtns.length; i++){
            $(declineBtns[i]).click(function(){
                apptID = declineBtns[i].parentNode.parentNode;
                apptID = $(apptID).attr('id');
                $('#darkBcground').css('display','block');
                if($('#btns-container').children().last().attr('id') == 'action-Button')
                   $('#btns-container').children().last().remove();
                var btn = document.createElement('button');
                $(btn).html('Decline');
                $(btn).attr('class','confirm-action-Button'); 
                $(btn).attr('onclick','decline_accept(apptID, "Declined")');
                $(btn).attr('id','action-Button');
                $('#action-word').html('Decline ');
                $('#btns-container').append(btn);
                $('#delete-confirmation').css('display','block');  
                
            })   
        } 
      var acceptBtns = document.getElementsByClassName('accept');
      for(let j = 0; j < acceptBtns.length; j++){
          $(acceptBtns[j]).click(function(){
              apptID = $(acceptBtns[j]).parent().parent();
              apptID = $(apptID).attr('id');
              $('#darkBcground').css('display','block');
              if($('#btns-container').children().last().attr('id') == 'action-Button')
                $('#btns-container').children().last().remove();
              var btn = document.createElement('button');
              $(btn).html('Accept');
              $(btn).attr('class','confirm-action-Button2'); 
              $(btn).attr('id','action-Button');
              $(btn).attr('onclick','decline_accept(apptID, "Accepted")');
              $('#action-word').html('Accept ');
              $('#btns-container').append(btn);
              $('#delete-confirmation').css('display','block');  
          })   
      } 
        $('#cancelButton').click(function(){
            closeMsg();
        })
        function closeMsg2(){
         $("#success-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
        }
  </script>
</html>
