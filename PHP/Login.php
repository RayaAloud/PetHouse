<?php 
    session_start();
    // require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
    require_once("Connection.php");
    
    $con = mysqli_connect(host,Username,Password,db);

    if(mysqli_connect_errno())
        die("Fail to connect to database :" . mysqli_connect_error());

    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $query_pet_Owner = "SELECT * FROM pet_owner WHERE Email = '$Email' AND Password = '$Password'";
    $query_manager = "SELECT * FROM Manager WHERE Email = '$Email' AND Password = '$Password'";
    $result_owner = mysqli_query($con,$query_pet_Owner);
    $result_manager = mysqli_query($con,$query_manager);

    if(mysqli_num_rows($result_owner) > 0){
        $_SESSION['email'] = $Email;
        $con -> close();
        header("Location: ../Pet_Owner/Dashboard.php");
    }
    else if(mysqli_num_rows($result_manager) > 0){
        $_SESSION['manager_email'] = $Email;
        $con -> close();
        header("Location: ../Manager/SideMenu.php");
    }
    else {
        $con -> close();
        session_start();
        $_SESSION['error'] = "Wrong Email/Password";
        header("Location: ../login.php");
    }
?>