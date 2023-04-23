<?php
session_start();
$admin_id = $_SESSION['admin'];
include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
include "../controllers/admin-dash.contr.class.php";
$dash = new AdminDashContr();
$meters = $dash->getMeters();
?>
<!DOCTYPE html>
<html lang="en" title="Unilink">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Meters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/user-history.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Smart Meters</h1>
            <form method="POST" action="add-meter.php">
            <button class="btn btn-custom" name="submit" style="background-color: green; color: white; border-color: black">Add Smart Meter</button>
        </form>
        </section>
        <section class="table__body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Meter ID</th>
      <th scope="col">Owner ID</th>
      <th scope="col">Electricity Status</th>
      <th scope="col">Water Status</th>
      <th scope="col">Recharge Electricity</th>
      <th scope="col">Recharge Water</th>
      <th scope="col">Electricity Balance</th>
      <th scope="col">Water Balance </th>
      <th scope="col">Delete Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if($meters){
    while($row = array_shift($meters)){
      $meter_id=$row['meterID'];
      $owner_id=$row['ownerID'];
      $elec_status=$row['status_elec'];
      $water_status=$row['status_wat'];
      $elec_rech=$row['recharge_elec'];
      $water_rech=$row['recharge_wat'];
      $elec_balance=$row['bal_elec'];
      $water_balance=$row['bal_wat'];
      echo ' <tr>
      <th scope="row">'.$meter_id.'</th>
      <td>'.$owner_id.'</td>
      <td>'.$elec_status.'</td> 
      <td>'.$water_status.'</td>
      <td>'.$elec_rech.'</td>
      <td>'.$water_rech.'</td>
      <td>'.$elec_balance.'</td>
      <td>'.$water_balance.'</td> 
      <td>
      <button class="btn btn-warning" type="submit"><a href="delete-meter.php?id='.$meter_id.'" class="text-dark">Delete</a></button>
        </td>
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




