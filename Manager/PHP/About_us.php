<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
  if(!$connection)
   die();
if(isset($_POST['save'])){ 
  if($_FILES['photo']['size'] > 0){
    $img = $_FILES['photo']['tmp_name'];
    $img = addslashes(file_get_contents($img)); 
    $description = $_POST['description'];
    $loc = $_POST['location'];
    $query = "UPDATE About_Us set Description ='".$description."', Location ='".$loc."', Photo = '".$img."' where ID = 1;";
  }
  else{
    $description = $_POST['description'];
    $loc = $_POST['location'];
    $query = "UPDATE About_Us set Description ='".$description."', Location ='".$loc."' where ID = 1;";
  }
  $result = mysqli_query($connection,$query);
  header('Location: ../sideMenu.php');
}
else{
  $query = 'select * from About_Us';
  $result = mysqli_query($connection,$query);
  $value = mysqli_fetch_array($result);
      echo "<script>
      var description = document.getElementById('desc');
      description.value = '".$value[1]."';";
      echo "document.getElementById('loc').value = '".$value[2]."'</script>";
      echo "\n<script>document.getElementById('aboutus-img').src ='data:image/png;charset=utf8;base64,".base64_encode($value[3])."'</script>";
}
 mysqli_close($connection);
?>