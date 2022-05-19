<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();

$Owner_Email = $_SESSION['email'];
$query="SELECT * FROM Appointment_Requests A, Pet P WHERE (Date > CURRENT_DATE() OR (Date = CURRENT_DATE() AND Time > CURRENT_TIME)) AND A.Status = 'Accepted' AND P.ID = A.PetID AND P.Owner_Email = '$Owner_Email';";
$result=mysqli_query($connection, $query);

if ($result) {
 while ($appt = mysqli_fetch_array($result)) {


     $pet = mysqli_query($connection,"SELECT * FROM Pet WHERE ID =".$appt['PetID'].";");
     $pet = mysqli_fetch_array($pet);
     print("
     <tr id='".$appt['Request_ID']."'>      
     <td><img class='t-img' src='data:image/png;charset=utf8;base64,".base64_encode($pet['Photo'])."' alt='Pet Photo'><span class='fs-5'>&nbsp;&nbsp;".$pet['Name']."</span></td>
     <td>".$appt['Service_Name']."</td>
     <td>".$appt['Date']."</td>
     <td>".$appt['Time']."</td>
     <td><button onclick='showNote(this)'> <i class='bi bi-chat-square-dots-fill noteIcon'></i> </button></td>
     <tr>"
     );
    
  }  
} 
else
  echo "An error occured.";     
?>
