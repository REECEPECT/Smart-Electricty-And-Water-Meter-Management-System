<?php
session_start();
$admin_id = $_SESSION['admin'];
include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
include "../controllers/admin-dash.contr.class.php";
$dash = new AdminDAshContr();
$msgs = $dash->getMsgs();
?>
<!DOCTYPE html>
<html lang="en" title="Unilink">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/user-history.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Messages</h1>
           

        </section>
        <section class="table__body">
        <table class="table">
  <thead>
    <tr>
  
      <th scope="col">Message ID</th>
      <th scope="col">Meter ID</th>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Message</th>
      <th scope="col">Reciept Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if($msgs){
    while($row = array_shift($msgs)){
      $msg_id=$row['msg_id'];
      $meter_id=$row['meter_id'];
      $user_id=$row['user_id'];
      $name=$row['name'];
      $mess=$row['msg'];
      $reciept_time=$row['reciept_time'];
      echo ' <tr>
      <th scope="row">'.$msg_id.'</th>
      <td>'.$meter_id.'</td>
      <td>'.$user_id.'</td> 
      <td>'.$name.'</td>
      <td>'.$mess.'</td>
      <td>'.$reciept_time.'</td> 
      </tr>';
    }
    
}
?>
  </tbody>
</table>
        </section>
    </main>
</body>

</html>




