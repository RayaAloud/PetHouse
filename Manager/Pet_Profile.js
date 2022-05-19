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