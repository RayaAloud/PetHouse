<?php
session_start();
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
if(!$connection)
die();
if(isset($_POST['save'])){
    $email = $_SESSION['email'];
    $Fname = $_POST['First_Name'];
    $newEmail = $_POST['email'];
    $Lname = $_POST['Last_Name'];
    $PhoneNo = $_POST['PhoneNo'];
    $gender = $_POST['gender'];
    if($_FILES['profile_photo']['size'] > 0){
            $profilePIC = $_FILES['profile_photo']['tmp_name'];
            $profilePIC = addslashes(file_get_contents($profilePIC));
            $query = "UPDATE Pet_Owner SET Email = '$newEmail', First_Name = '".$Fname."', Last_Name = '".$Lname."', PhoneNo = '".$PhoneNo."', Profile_Photo ='".$profilePIC."', Gender = '$gender' WHERE Email = '$email'";
            $_SESSION['email'] = $newEmail;    
    }
    else{
        $query = "UPDATE Pet_Owner SET Email = '$newEmail', First_Name = '".$Fname."', Last_Name = '".$Lname."', PhoneNo = '".$PhoneNo."', Gender = '$gender' WHERE Email = '$email'";
        $_SESSION['email'] = $newEmail;
    }
    $result = mysqli_query($connection, $query);
}
mysqli_close($connection);
?>