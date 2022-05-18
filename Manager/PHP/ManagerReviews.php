<?php

if ( !( $database = mysqli_connect( "localhost", "root", "root" ) ) )
die( "<p>Could not connect to database</p>" );
if ( !mysqli_select_db($database, "PetHouse" ) )
die( "<p>Could not open URL database</p>" );
$query="SELECT * FROM Reviews";

$result=mysqli_query($database, $query);
if ($result) {
while ($data = mysqli_fetch_row($result)) {
 print("
 <div class='card w-100 pb-3' style='box-shadow: 1px 1px 15px 1px #ebebeb; border:none;border-radius:25px; padding: 4px;'>
 <div class='card-body'>
   <h5 class='card-title pb-3'> <i class='fa-solid fa-user' style='padding-right: 10px;' onclick='show()''></i>
   <p> <a href='.'mailto:'".$data[2]."'>  Contact ".$data[1]."'s Owner  </a> </p> </h5>
   <p class='card-text'>".$data[1]."</p>
 </div>
</div> ");
}
  }



//stars
//<i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star' ></i><i class='fa-solid fa-star' style='color: gray;''></i>
?>