<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
   die();
$query = "SELECT * FROM Appointment_Requests WHERE Status = 'Pending';";
$result = mysqli_query($connection,$query);
if($result){
   if($result -> num_rows > 0){
      print('<div class="box mb-5">
      <table id="requests_table">
         <thead>
         <tr>
           <th class="text-center pt-4 pb-2">Pet</th>
           <th class="text-center pt-4 pb-2">Service</th>
           <th class="text-center pt-4 pb-2">Date</th>
           <th class="text-center pt-4 pb-2">Time</th>
           <th class="text-center pt-4 pb-2">Notes</th>
           <th class="text-center pt-4 pb-2">Accept/Decline</th>
         </tr>
         </thead>
         <tbody id="appointments"></tbody></table></div>');
         while($row = mysqli_fetch_array($result)){ 
            $query = "SELECT Photo FROM Pet WHERE ID = ".$row['PetID'].";";
            $pet_result = mysqli_fetch_array(mysqli_query($connection,$query));   
            echo "<script> document.getElementById('appointments').innerHTML +='";
            echo "<tr id=\'".$row['Request_ID']."\'>";
            echo "<td><button class=\'btns\' onclick=\'showPetProfile(this)\'><img class=\'t-img\' src=\'data:image/png;charset=utf8;base64,".base64_encode($pet_result['Photo'])."\' alt=\'Pet Photo\'></button></td>";
            echo "<td>".$row['Service_Name']."</td>";
            echo "<td>".dateFormat($row['Date'])."</td>";
            echo "<td>".timeFormat($row['Time'])."</td>";      
            echo "<td><button class=\'btns\' onclick=\'showNote(this)\'>";
            echo "<i class=\'bi bi-chat-square-dots-fill noteIcon\'></button></td>";          
            echo "<td><i class=\'bi bi-check-circle-fill accept\'></i><i class=\'bi bi-x-circle-fill decline\'></i></td>";
            echo "</tr>'";           
            echo "</script>";      
         }
   }
   else{
      print('<div class="d-flex text-center noAppt pt-5">
            <div class="d-flex flex-column">
             <img src="../Images/undraw_no_data.png" height="330px">
             <p class="fs-4 mt-5 w-100">No Appointment Requests</p>
            </div></div>');
   }
}
function timeFormat($time){
   $time = explode(":",$time);
   if($time[0] < 12){
     if($time[0] == 0)
       $time = ($time[0]+12).":".$time[1]." AM";
     else{
       $time = $time[0].":".$time[1]." AM";
     }
   }
   else{
       if($time[0] == 12){
           $time = $time[0].":".$time[1]." PM";
       }
       else{
           $time = ($time[0]-12).":".$time[1]." PM";
       }
   }
   return $time;
}
function dateFormat($date){
   $date = explode("-",$date);
   $date = $date[2]."/".$date[1]."/".$date[0];
   return $date;
}

$connection -> close();
?>