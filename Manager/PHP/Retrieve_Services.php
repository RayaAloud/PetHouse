<?php
include 'Connection.php';
$connection = mysqli_connect(host,Username,Password,db);
  if(!$connection)
   die();
$query = "Select * from Service";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($result)){
    echo "<script>
    
    var newChild = '<div class='cards'>
    <div class='pl-3 pt-3 pr-3'>
      <div>
        <i class='bi bi-pencil-square edit' onclick='show()'></i>
        <i class='bi bi-trash3 garbage'></i>
      </div>
      <img src='../Images/Component40.png' width='130px' height='130px'>
      <p class='main-info'>Checkup</p><p class='main-info'>180SR</p>
    </div>
    <hr>
      <h5 class='collap w-100'>
        <i class='bi bi-chevron-down'></i>
      </h5>
        <div class='content'>
          <p class='main-info'>Description</p>
          <p>content</p>
        </div>
  </div>';


    var menu = document.getElementById('menu');
    menu.innerHTML += newChild;
    </script>";
}

?>