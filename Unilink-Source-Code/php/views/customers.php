<?php
session_start();
$admin_id = $_SESSION['admin'];
include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
include "../controllers/admin-dash.contr.class.php";
$dash = new AdminDashContr();
$customers = $dash->viewCustomers();
?>
<!DOCTYPE html>
<html lang="en" title="Unilink">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/user-history.css">
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Customers</h1>
        </section>
        <section class="table__body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Adress</th>
      <th scope="col">Password</th>
      <th scope="col">Delete Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if($customers){
    while($row = array_shift($customers)){
      $user_id=$row['user_id'];
      $name=$row['name'];
      $email=$row['email'];
      $mobile=$row['mobile'];
      $adress=$row['adress'];
      $password=$row['pass'];
      echo ' <tr>
      <th scope="row">'.$user_id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td> 
      <td>'.$mobile.'</td>
      <td>'.$adress.'</td>
      <td>'.$password.'</td>
      <td>
      <button class="btn btn-warning" type="submit"><a href="delete-user.php?id='.$user_id.'" class="text-dark">Delete</a></button>
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




