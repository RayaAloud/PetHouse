<?php

if (!($database = mysqli_connect( "localhost:8889", "root", "")))
die( "<p>Could not connect to database</p>" );
if ( !mysqli_select_db($database, "PetHouse" ) )
die( "<p>Could not open URL database</p>" );
$query="SELECT * FROM Reviews";

$result=mysqli_query($database, $query);
if ($result) {
while ($data = mysqli_fetch_array($result)) {
 $query = "SELECT First_Name FROM Pet_Owner WHERE Email = '".$data['Owner_Email']."';";
 $owner_name = mysqli_fetch_array(mysqli_query($database,$query));
 print("
 <div class='card w-100' style='box-shadow: 1px 1px 15px 1px #ebebeb; border:none;border-radius:25px; padding: 4px;'>
 <div class='card-body'>
   <h5 class='card-title pb-2'><i class='fa-solid fa-user' style='padding-right: 10px;'></i>".$owner_name['First_Name']."</h5>");
  if($data['Rate'] == 0){
    print("<div class='pb-2'>
            <i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i>
          </div>");
  }
  else if($data['Rate'] == 1){
    print("<div class='pb-2'>
            <i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i>
          </div>");
  }
  else if($data['Rate'] == 2){
    print("<div>
            <i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i>
          </div>");
  }
  else if($data['Rate'] == 3){
    print("<div class='pb-2'>
            <i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i>
          </div>");
  }
  else if($data['Rate'] == 4){
    print("<div>
    <i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(173, 173, 173);'></i>
     </div>");
  }
  else if($data['Rate'] == 5){
    print("<div>
    <i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i><i class='fa-solid fa-star' style='color: rgb(247, 183, 65)'></i>
     </div>");
  }
 print("<p class='card-text'>".$data['Opinion']."</p>"."<p class='contact_owner'><i class='bi bi-envelope-fill emailIcon'></i><a href='.'mailto:'".$data['Owner_Email']."'> Contact Pet Owner</a></p></div></div> ");
  }
}



//stars
//<i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star' ></i><i class='fa-solid fa-star' style='color: gray;''></i>
?>