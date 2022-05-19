<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$email = $_SESSION['email'];
$query = "SELECT * FROM Appointment_Requests A, Pet P WHERE (Date < CURRENT_DATE() OR (Date = CURRENT_DATE() AND Time < CURRENT_TIME)) AND A.Status = 'Accepted' AND P.ID = A.PetID AND P.Owner_Email = '$email';";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($result)){
    $pet = mysqli_query($connection,"SELECT * FROM Pet WHERE ID =".$row['PetID'].";");
    $pet = mysqli_fetch_array($pet);
    echo "<script>document.getElementsByTagName('tbody')[0].innerHTML += '";
    echo "<tr id=\'".$row['Request_ID']."\'>";
    echo "<td><img class=\'t-img\' src=\'data:image/png;charset=utf8;base64,".base64_encode($pet['Photo'])."\' alt=\'Pet Photo\'><span class=\'fs-5\'>&nbsp;&nbsp;".$pet['Name']."</span></td>";
    echo "<td>".$row['Service_Name']."</td>";
    echo "<td>".dateFormat($row['Date'])."</td>";
    echo "<td>".timeFormat($row['Time'])."</td>";
    echo "<td><button class=\'noteBtn\' onclick=\'showNote(this)\'> <i class=\'bi bi-chat-square-dots-fill noteIcon\'> </button></td>";
    if($row['isReviewed'] == 1)
    echo "<td class=\'reviewed\'>Reviewed</td>";
    else
    echo "<td> <button class=\'reviewBtn\' onclick=\'show(this)\'>Review</button></td>";
    echo "</tr>'";
    echo "</script>";
}
$connection -> close();
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

?>