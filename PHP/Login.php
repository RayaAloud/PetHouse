<?php 
    session_start();
    // require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
    require_once("Connection.php");
    
    $con = mysqli_connect(host,Username,Password,db);

    if(mysqli_connect_errno())
        die("Fail to connect to database :" . mysqli_connect_error());

    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $query = "SELECT * FROM pet_owner WHERE Email = '$Email' AND Password = '$Password'";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['email'] = $Email;
        $con -> close();
        header("Location: ../Pet_Owner/Dashboard.php");
    }
    else {
        $con -> close();
        header("Location: login.php?error=Wrong Email/Password");
    }
?>