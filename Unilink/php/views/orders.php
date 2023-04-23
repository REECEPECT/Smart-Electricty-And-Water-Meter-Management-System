<?php
session_start();
$admin_id = $_SESSION['admin'];
include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
include "../controllers/orders.contr.class.php";
$dash = new OrdersContr();
$orders= $dash->orders();
?>
<!DOCTYPE html>
<html lang="en" title="Unilink">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/user-history.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Orders</h1>
           

        </section>
        <section class="table__body">
        <table class="table">
  <thead>
    <tr>
  
      <th scope="col">Order ID</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      <th scope="col">Adress</th>
      <th scope="col">Reciept Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if($orders){
    while($row = array_shift($orders)){
      $order_id=$row['order_id'];
      $name=$row['name'];
      $mobile=$row['mobile'];
      $email=$row['email'];
      $message=$row['message'];
      $adress=$row['adress'];
      $reciept_time=$row['reciept_time'];
      echo ' <tr>
      <th scope="row">'.$order_id.'</th>
      <td>'.$name.'</td>
      <td>'.$mobile.'</td> 
      <td>'.$email.'</td>
      <td>'.$message.'</td>
      <td>'.$adress.'</td> 
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




