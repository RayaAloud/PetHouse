<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$email = 'reem@gmail.com';
$query = "SELECT * FROM Appointment_Requests WHERE Owner_Email = '$email'";
$result = mysqli_query($connection, $query);
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
while($row = mysqli_fetch_array($result)){
    $query = "SELECT Date, Time, Service_Name FROM Available_Appointment WHERE Appointment_ID =".$row['Appointment_ID'].";";
    $sub_result = mysqli_fetch_array(mysqli_query($connection,$query));
    $query = "SELECT Name, Photo FROM Pet WHERE ID = ".$row['PetID'].";";
    $pet_result = mysqli_fetch_array(mysqli_query($connection,$query));
    echo "<script> document.getElementsByTagName('tbody')[0].innerHTML +='";
    echo "<tr id=\'".$row['Appointment_ID']."\'>";
    echo "<td pet_name=\'".$pet_result['Name']."\'><img class=\'t-img\' src=\'data:image/png;charset=utf8;base64,".base64_encode($pet_result['Photo'])."\' alt=\'Pet Photo\'></td>";
    echo "<td>".$sub_result['Service_Name']."</td>";
    echo "<td>".dateFormat($sub_result['Date'])."</td>";
    echo "<td>".timeFormat($sub_result['Time'])."</td>";
    echo "<td> <button class=\'noteBtn\' onclick=\'showNote(this)\'> <i class=\'bi bi-chat-square-dots-fill noteIcon\'></i></button></td>";
    echo "<td class=\'".$row['Status']."\'>".$row['Status']."</td>";
    echo "<td>";
    echo "<button class=\'buttons editBtn\'>";
    echo "<i class=\'bi bi-pencil-square pencilIcon\'></i>";
    echo "</button>";
    echo "<button class=\'cancelButtons\'>Cancel</button>";
    echo "</td></tr>'";
    echo "</script>"; 
}
$connection -> close();
?>