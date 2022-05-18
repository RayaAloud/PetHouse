<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments Requests</title>
    <!--External CSS-->
    <link rel="stylesheet" href="style/Appointment.css">
    <!--Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
     <!--Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--jQuery-->
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>

    <div class="mb-4">
        <div class="upcoming-apt">
          <p>Upcoming Appointments</p>
        <div class="line"></div>
      </div>
      <div class="box mb-5">
       <table>
      
          <thead>
          <tr>
            <th class="text-center pt-4 pb-2">Pet</th>
            <th class="text-center pt-4 pb-2">Service</th>
            <th class="text-center pt-4 pb-2">Date</th>
            <th class="text-center pt-4 pb-2">Time</th>
            <th class="text-center pt-4 pb-2">Notes</th>
          </tr>
          </thead>
      
          <tbody>
           <!-- <tr >
              <td><img class="t-img" src="../Images/catPurple.png" alt=""></td>
              <td>Checkup</td>
              <td>27/1/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"></i></button> </td>
            </tr>
      
            <tr>
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/10/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"> </button></td>
            </tr>
      
            <tr>
              <td><img class="t-img" src="../Images/catPurple.png" alt=""></td>
              <td>Checkup</td>
              <td>14/11/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"></button></td>
            </tr>
      
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/2/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"><i class="bi bi-chat-square-dots-fill noteIcon"></i></button></td>
            </tr>
            <tr>
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/2/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"> <i class="bi bi-chat-square-dots-fill noteIcon"></i></button></td>
            </tr>
         
            <tr>
              <td><img class="t-img" src="../Images/catBabyBlue.png" alt=""></td>
              <td>Washing</td>
              <td>27/2/2022</td>
              <td>10:30am</td>
              <td> <button class="btns"><i class="bi bi-chat-square-dots-fill noteIcon"></i></button></td>
            </tr>
-->
          </tbody>
        </table>
       </div>
 
</body>
<?php include'PHP/RetrieveUpcoming.php'?>
</html>