<?php 
session_start();
    if (isset($_POST['signup-submit']))
        
        require_once("Connection.php");
        
        $con = mysqli_connect(host,Username,Password,db);

        if(mysqli_connect_errno())
            die("Fail to connect to database :" . mysqli_connect_error());

        
        $Email = $_POST['email'];
        $First_Name = $_POST['fname'];
        $Last_Name = $_POST['lname'];
        $PhoneNo = $_POST['phone'];
        $Gender = $_POST['gender'];
        $Password = $_POST['password'];
        $img = $_FILES['profile-img']['tmp_name'];
        $img = addslashes(file_get_contents($img));

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

        $query="INSERT INTO `pet_owner` VALUES ('$Email','$First_Name','$Last_Name','$PhoneNo','$Gender','$Password','$img')";
        if (mysqli_query($con, $query)) {
            echo "New record created successfully !";
            $_SESSION['email'] = $Email ; //!sure if email
            header("Location: ../PetOwner/Dashboard.php");
            $con -> close();
            exit;
        } else {
            echo "Error: ".mysqli_error($con);
  }