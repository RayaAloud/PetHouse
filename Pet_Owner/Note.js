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