
<?php
session_start();
$admin_id = $_SESSION['admin'];
include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
include "../controllers/admin-dash.contr.class.php";
$dash = new AdminDashContr();
$logs = $dash->getLogs();
$customers = $dash->getCustomers();
$devices = $dash->getDevices();
$orders = $dash->getOrders();
$messages = $dash->getMessages();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Unilink Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/admin-dash.css">
    
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(../../images/unilink.jpg)"></div>
                <h4>Administrator</h4>
                <small>Unilink Smart Solutions</small>
            </div>
            <div class="side-menu">
                <ul>
                    <li>
                       <a href="vouchers.php" class="active">
                            <span class="las la-barcode"></span>
                            <small>Vouchers</small>
                        </a>
                    </li>
                    <li>
                       <a href="../logout.inc.php" class="active">
                            <span class="las la-power-off"></span>
                            <small>Logout</small>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">

                
                    

                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Dashboard</h1>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">
                <a href="customers.php">
                    <div class="card">
                        <div class="card-head">
                            <h2> <?php echo $customers?></h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Customers</small>

                        </div>
                    </div>
                    </a>
                    <a href="meters.php">
                    <div class="card">
                        <div class="card-head">
                            <h2><?php echo $devices?></h2>
                            <span class="las la-satellite-dish"></span>
                        </div>
                        <div class="card-progress">
                            <small>Devices</small>

                        </div>
                    </div>
                    </a>
                    <a href="orders.php">
                    <div class="card">
                        <div class="card-head">
                            <h2><?php echo $orders?></h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Orders</small>
                        </div>
                    </div>
                    </a>
                    <a href="messages.php">
                    <div class="card">
                        <div class="card-head">
                            <h2><?php echo $messages?></h2>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>Messages from customers</small>
                        </div>
                    </div>
                    </a>

                </div>


                <div class="records table-responsive">

<div class="record-header">
<h3> Records</h3>
</div>

<div>
<table class="table" width=100%>
  <thead>
    <tr>
  
      <th scope="col">Record ID</th>
      <th scope="col">Meter ID</th>
      <th scope="col">Electricity Consumption</th>
      <th scope="col">Water Consumption</th>
      <th scope="col">Update Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if($logs){
    while($row = array_shift($logs)){
      $record_id=$row['recordID'];
      $meter_id=$row['meterID'];
      $elecCons=$row['elec_cons'];
      $waterCons=$row['wat_cons'];
      $update_time = $row['update_time'];
      echo ' <tr>
      <td>'.$record_id.'</td>
      <td>'.$meter_id.'</td>
      <td>'.$elecCons.'</td> 
      <td>'.$waterCons.'</td>
      <td>'.$update_time.'</td>
      </tr>';
    }
    
}
?>
  </tbody>
</table>
</div>

</div>
            
            </div>
            
        </main>
        
    </div>
    
</body>
</html>