<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Appointments</title>
    <!--External CSS-->
    <link rel="stylesheet" href="Style/AvailableApt.css">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--jQuery-->  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
     <!--AJAX-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<div id="darkBcground"></div>
    <div id="delete-confirmation">
      <div id="content-container" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeMsg()">X</button>
        <h3 class="mb-5">Delete this appointment?</h3>
        <div>
            <button id="cancelButton" onclick="closeMsg()">Cancel</button>
            <button class="confirm-action-Button" id="delete-Btn">Delete</button>
        </div>
      </div>
    </div>
    <!--confirmation MSG-->
    <div id="success-confirmation">
      <div id="content-container" class="d-flex flex-column align-items-center m-auto">
        <button id="cancelBtn" class="align-self-end" onclick="closeMsg2()">X</button>
        <i class="bi bi-check-circle-fill"></i>
        <h4 class="mb-5 text-center msg">Appointment Deleted Successfully</h4>
        <div id="btns-container">
            <button id="okButton" onclick="closeMsg2()">OK</button>
        </div>
      </div>
    </div>
    <div class="mb-4 mt-5">
        <div class="available-apt col-10 d-flex justify-content-between" id="topContainer">
            <div class="col-10">
                <p>Available Appointments</p>
                <div class="line"></div>
            </div>
            <button type="button" class="justify-self-end" id="Add" onclick="showPage('AddAppointment.php','content')">+</button>
        </div>
        <!--table-->
     <div class="box mb-4 mt-5">
        <table>
            <thead>
            <tr>
                <th class="text-center pt-4 pb-2">Service</th>
                <th class="text-center pt-4 pb-2">Date</th>
                <th class="text-center pt-4 pb-2">Time</th>
                <th class="text-center pt-4 pb-2"></th>
            </tr>
            </thead>
            <tbody>
            <!--Available Appointments Here--> 
            </tbody>
        </table> 
     </div>
  </div>
 <?php include 'PHP/Retrieve_Available_Appointments.php'?>
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
        function closeMsg(){
         $("#delete-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
        }
        function closeMsg2(){
         $("#success-confirmation").css('display','none'); 
         $('#darkBcground').css('display','none');
        }
        var editBtns = document.getElementsByClassName('editBtn');
        for(let i = 0; i < editBtns.length; i++){
            $(editBtns[i]).click(function(){
                var appt = editBtns[i].parentNode.parentNode;
                var apptID = $(appt).attr('id');
                sessionStorage.setItem('Available_appt_toBe_Edited_Id',apptID);
                sessionStorage.setItem('Available_appt_toBe_Edited_service',appt.childNodes[0].innerHTML);
                sessionStorage.setItem('Available_appt_toBe_Edited_Date',appt.childNodes[1].innerHTML);
                sessionStorage.setItem('Available_appt_toBe_Edited_Time',appt.childNodes[2].innerHTML);
                showPage('UpdateAppointment.php','content');
            })   
        }
        var apptID;
        var deleteBtns = document.getElementsByClassName('deleteBtns');
        for(let i = 0; i < deleteBtns.length; i++){
            $(deleteBtns[i]).click(function(){
                apptID = deleteBtns[i].parentNode.parentNode;
                apptID = $(apptID).attr('id');
                $('#darkBcground').css('display','block');
                $('#delete-confirmation').css('display','block');  
            })   
        } 
        $('#delete-Btn').click(function(){
           $.ajax({
            url: 'PHP/Delete_Appointment.php',
            method: 'POST',
            data: {ApptID : apptID}
           }).done(function(msg){
              closeMsg();
              $("#success-confirmation").css('display','block'); 
              $('#darkBcground').css('display','block');
           })
        })
        
    </script>
</body>
</html>