<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();

$Owner_Email = $_SESSION['email'];
$query="SELECT PetID,Name,Service_Name,Date,Time,Note FROM Appointment_Requests A,Pet P WHERE A.status='Accepted' AND (SELECT Owner_Email FROM Pet WHERE ID = PetID) = '$Owner_Email' AND PetID = ID";
$result=mysqli_query($connection, $query);

if ($result) {
 while ($appt = mysqli_fetch_array($result)) {

  $date = explode("-",$appt['Date']);
  if($date > date("Y-m-d")){
    $date = $date[2]."/".$date[1]."/".$date[0];
     print("
     <tr>      
     <td>".$appt['Name']."</td>
     <td>".$appt['Service_Name']."</td>
     <td>".$date."</td>
     <td>".$appt['Time']."</td>
     <td><button onclick='showNote(this)'> <i class='bi bi-chat-square-dots-fill noteIcon'></i> </button></td>
     <tr>"
     );
    }
  }  
  //<script>document.getElementsByTagName('tbody')[0].innerHTML +='
} 
else
  echo "An error occured.";     
?>
