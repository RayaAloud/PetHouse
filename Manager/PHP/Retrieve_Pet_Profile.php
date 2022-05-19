<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
$appointment_ID = $_POST['Appt_ID'];
$query = "SELECT PetID FROM Appointment_Requests WHERE Request_ID = $appointment_ID";
$row = mysqli_fetch_array(mysqli_query($connection,$query));
$petID =  $row['PetID'];
$query = "SELECT * FROM Pet WHERE ID = $petID;";
$result = mysqli_query($connection,$query);
$i = 0;
$arr;
$obj;
while($row = mysqli_fetch_array($result)){
    $obj['Pet_Name'] = $row['Name'];
    $obj['DOB'] = $row['DOB'];
    $obj['Gender'] = $row['Gender'];
    $obj['Breed'] = $row['Breed'];
    $obj['Status'] = $row['Status'];
    $obj['Medical-History'] = $row['Medical_History'];
    $obj['Vaccination'] = $row['Vaccination_list'];
    $obj['Photo'] = base64_encode($row['Photo']);
    $arr[$i] = $obj;
    $i++;
}
echo json_encode($arr);
$connection -> close();
?>