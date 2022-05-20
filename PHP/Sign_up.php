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
        if($_FILES['profile-img']['size'] > 0){
            $img = $_FILES['profile-img']['tmp_name'];
            $img = addslashes(file_get_contents($img));
        }
        else{
            $img = null;
        }
        
        $validateEmail = preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $Email);
        $specialChars = preg_match('@[^\w]@', $Password);
        if(!$validateEmail){
            $_SESSION['Sign_up_error'] = "Invalid email address.";
            header("Location: ../signup.php"); 
                exit;
        }
        if( !$specialChars && strlen($Password) < 8) {
            $_SESSION['Sign_up_error'] = 'Password must be at leat 8 characters and contain at least one special character #,&,..';
            header("Location: ../signup.php"); 
            exit;
        }
        if(strlen($Password) < 8){
            $_SESSION['Sign_up_error'] = 'Password should be at leat 8 characters!';
            header("Location: ../signup.php"); 
            exit;
        }
       
        
        if( !$specialChars ) {
            $_SESSION['Sign_up_error'] = 'Password must contain at least one special character #,&,..';
            header("Location: ../signup.php"); 
            exit;
        }
        

        //check if the email exits 
        $query = "SELECT * FROM pet_owner WHERE Email = '$Email' ";
        $owner_result = mysqli_query($con,$query);
        $query = "SELECT * FROM Manager WHERE Email = '$Email' ";
        $manager_result = mysqli_query($con,$query);
        if (mysqli_num_rows($owner_result)>0 || mysqli_num_rows( $manager_result)>0)
        {
            $_SESSION['Sign_up_error'] = 'Email exists!';
            header("Location: ../signup.php"); 
            $con -> close();
            exit;
        }
        
        
        if($img == null)
        $query="INSERT INTO `pet_owner` VALUES ('$Email','$First_Name','$Last_Name','$PhoneNo','$Gender','$Password', NULL)";
        else
        $query="INSERT INTO `pet_owner` VALUES ('$Email','$First_Name','$Last_Name','$PhoneNo','$Gender','$Password','$img')";
        if (mysqli_query($con, $query)) {
            echo "New record created successfully !";
            $_SESSION['email'] = $Email ; //!sure if email
            header("Location: ../Pet_Owner/Dashboard.php");
            $con -> close();
            exit;
        } else {
            echo "Error: ".mysqli_error($con);
  }