<?php
session_start();
$admin_id = $_SESSION['admin'];
include "../dbhandler/dbh.class.php";
include "../models/vouchers.model.class.php";
include "../controllers/vouchers.contr.class.php";
$vouchers = new vouchersContr();
$results = $vouchers->vouchers();

?>
<!DOCTYPE html>
<html lang="en" title="Unilink">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vouchers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/user-history.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Vouchers</h1>
           

        </section>
        <section class="table__body">
        <table class="table">
  <thead>
    <tr>
  
      <th scope="col">Voucher ID</th>
      <th scope="col">Voucher Code</th>
      <th scope="col">Amount</th>
      <th scope="col">Type</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if($results){
    while($row = array_shift($results)){
      $voucher_id=$row['voucher_id'];
      $voucher_code=$row['voucher_code'];
      $amount=$row['amount'];
      $type=$row['type'];
      $status = $row['status'];
      echo ' <tr>
      <th scope="row">'.$voucher_id.'</th>
      <td>'.$voucher_code.'</td>
      <td>'.$amount.'</td> 
      <td>'.$type.'</td>
      <td>'.$status.'</td>
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




