<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!--jQuery-->
     <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
     <!--External CSS-->
     <link rel="stylesheet" href="Style/Add_Service.css">
    <script>
        $('#imgUpload').change(function(){
            document.getElementById('pet-image').src = window.URL.createObjectURL(this.files[0]);
        })
    </script>   
</head>
<body>
    <div class="form-container d-flex flex-column offset-2">
        <?php if(isset($_SESSION['Add_Service_Error'])){
            echo "<div class='alert alert-danger' role='alert'>".$_SESSION['Add_Service_Error']."</div>";
            unset($_SESSION['Add_Service_Error']);
        }
        ?>
        <iframe id="iframe" name="my_iframe">
        </iframe>
        <form method="POST" action="PHP/Add_Service.php" enctype="multipart/form-data" target="my_iframe" id="add_service_form">
        <div class="container d-flex justify-content-between">
        <div class="d-flex flex-column" id="inputFields">
        <div class="row">
            <label>Service Name</label>
            <input type="text" name="ServiceName">
        </div>
        <div class="row">
            <label>Service Price</label>
            <input type="number" name="Price">
        </div>
        <div class="row">
            <label>Description</label>
            <textarea name="Description" id="Description" class="p-3"></textarea>
        </div>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-end">
            <div id="addinPic" class="d-flex flex-column">
                <img id="pet-image" src="../Images/bath.png" alt="pet picture" width="100px" height="100px">
                <input type="file" id="imgUpload" name="Photo">
                <label for="imgUpload" class="align-self-end"><i class="bi bi-plus-circle-fill" id="plusS"></i></label>
             </div>
        </div>
        </div>
        <div class="col-6 d-flex m-auto justify-content-around mt-5">
            <button class="cancelBtn" type="button" onclick="cancel()">Cancel</button>
            <button id="AddBtn" type="submit" name="add">Add Service</button>
        </div>
      </form>
    </div>
</body>
    <script>

    </script>
</html>