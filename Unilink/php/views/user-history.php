<?php
session_start();
$meterid = $_SESSION['meterid'];
include "../dbhandler/dbh.class.php";
include "../models/user-history.model.class.php";
include "../controllers/user-history.contr.class.php";
$history = new HistoryContr($meterid);
$results = $history->getData($meterid);

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
            <h1>History</h1>
           

        </section>
        <section class="table__body">
        <table class="table">
  <thead>
    <tr>
  
      <th scope="col">Meter ID</th>
      <th scope="col">Electricity Consumption</th>
      <th scope="col">Water Consumption</th>
      <th scope="col">Update Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if($results){
    while($row = array_shift($results)){
      $meter_id=$row['meterID'];
      $elec_cons=$row['elec_cons'];
      $wat_cons=$row['wat_cons'];
      $update_time=$row['update_time'];
      echo ' <tr>
      <th scope="row">'.$meter_id.'</th>
      <td>'.$elec_cons.'</td>
      <td>'.$wat_cons.'</td> 
      <td>'.$update_time.'</td>
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




