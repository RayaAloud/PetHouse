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
     print("
     <tr>      
     <td>".$appt['Name']."</td>
     <td>".$appt['Service_Name']."</td>
     <td>".$appt['Date']."</td>
     <td>".$appt['Time']."</td>
     <td><button> <i class='bi bi-chat-square-dots-fill noteIcon'></i> </button></td>
     <tr>"
     );
  }  
  //<script>document.getElementsByTagName('tbody')[0].innerHTML +='
} 
else
  echo "An error occured.";     
?>