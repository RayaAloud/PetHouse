<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();

$Owner_Email = $_Session['email'];
$pet_ID = $_POST['ID'];
$query="SELECT PetID,Service_Name,Date,Time FROM appointment_requests, pet WHERE status='accepted', PetID = $pet_ID, Owner_Email = $Owner_Email";
$result=mysqli_query($connection, $query);

if ($result) {
 while ($appt = mysqli_fetch_row($result)) {
     print("<tr>      
     <th scope='row'><p>".$appt['PetID']."</p>
     <td>".$appt['Service_Name']."</td>
     <td>".$appt['Date']."</td>
     <td>".$appt['Time']."</td>
     <td> <button>Note</button> </td>
      ");
  }  
} 
else
  echo "An error occured.";     
?>