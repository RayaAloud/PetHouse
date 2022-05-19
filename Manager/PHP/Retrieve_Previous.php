<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
  if(!$connection)
   die();

$query = "Select * from Appointment_Requests A , pet P WHERE A.status = 'Accepted' and A.PetID = P.ID";
$result = mysqli_query($connection,$query);

while($row = mysqli_fetch_array($result)){
    $time = explode(":",$row['Time']);
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
    $date = explode("-",$row['Date']);
   // $stat = explode("",$row['Status']);
    if($date > date("Y-m-d"))
       // if($stat == "Accepted")
    {
        $date = $date[2]."/".$date[1]."/".$date[0];
        
        echo "<script> document.getElementsByTagName('tbody')[0].innerHTML +='";
        echo "<tr id=\'".$row['Request_ID']."\'>";
       // echo "<td>"./*pic*/."</td>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Service_Name']."</td>";
        echo "<td>".$date."</td>";
        echo "<td>".$time."</td>";
        echo "<td><button class=\'btns\' onclick=\'showNote(this)\'>";
        echo "<i class=\'bi bi-chat-square-dots-fill noteIcon\'></button></td>";  
        echo "</tr>'";
        echo "</script>";
    }
}

mysqli_close($connection);

?>
