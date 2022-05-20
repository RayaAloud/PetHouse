<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
  if(!$connection)
   die();
$query = "SELECT * FROM Available_Appointment";
$result = mysqli_query($connection,$query);
if($result){
    while($row = mysqli_fetch_array($result)){
        $time = explode(":",$row['Time']);
        $time[0] = (int)$time[0];
        $time[1] = (int)$time[1];
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
        $date = $date[2]."/".$date[1]."/".$date[0];
        
        echo "<script> document.getElementsByTagName('tbody')[0].innerHTML +='";
        echo "<tr id=\'".$row['Appointment_ID']."\'>";
        echo "<td>".$row['Service_Name']."</td>";
        echo "<td>".$date."</td>";
        echo "<td>".$time."</td>";
        echo "<td> <button class=\'buttons deleteBtns\'>";
        echo "<i class=\'bi bi-trash3 trashIcon\'></i></button>";
        echo "<button class=\'buttons editBtn\'>";
        echo "<i class=\'bi bi-pencil-square pencilIcon\'>";
        echo "</i></button></td>";
        echo "</tr>'";
        echo "</script>";
    }

}
mysqli_close($connection);

?>