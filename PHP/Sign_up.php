<?php 
session_start();
    if (isset($_POST['signup-submit']))
        
        require_once("Connection.php");
        
        $con = mysqli_connect(host,Username,Password,db);

        if(mysqli_connect_errno())
            die("Fail to connect to database :" . mysqli_connect_error());

        /*$username = $_POST['user'];
        $password = $_POST['pw'];
        $password2 = $_POST['re-pw'];*/ 
        $Email = $_POST['email'];
        $First_Name = $_POST['fname'];
        $Last_Name = $_POST['lname'];
        $PhoneNo = $_POST['phone'];
        $Gender = $_POST['gender'];
        $Password = $_POST['password'];
        $img = $_FILES['profile-img']['tmp_name'];
        $img = addslashes(file_get_contents($img));

        /*if ($password !== $password2) {
        header("Location: signup.php?error=password doesn't match");
        exit;
        }*/

        //check if the email exits 
        $query = "SELECT * FROM pet_owner WHERE Email = '$Email' ";

        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0)
        {
            header("Location: ../signup.php?error=Email exists!"); 
            $con -> close();
            exit;
        }
        
        //else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //header("Location: signup.php?error=EMAIL syntax is wrong");
         //exit; -->
        //}

        $query="INSERT INTO `pet_owner`(`Email`, `First_Name`, `Last_Name`, `PhoneNo` ,`Gender`, `Password`) VALUES ('$Email','$First_Name','$Last_Name','$PhoneNo','$Gender','$Password')";
        if (mysqli_query($con, $query)) {
            echo "New record created successfully !";
            $_SESSION['Logged_in'] = true; //!sure if email
            header("Location: ../indexsigned.php");
            $con -> close();
            exit;
        } else {
            echo "Error: ".mysqli_error($con);
  }