<?php
session_start();
$meterid = $_SESSION['meterid'];
include "../dbhandler/dbh.class.php";
include "../models/user-dash.model.class.php";
include "../controllers/user-dash.contr.class.php";
$balances = new UserDashContr($meterid);
$stat = $_POST['status'];
if($stat=="Water Bal. Status: 1"){
    $balances->setOFFWater($meterid);
    echo "Water Bal. Status: 0";
}
else{
    $balances->setONWater($meterid);
    echo "Water Bal. Status: 1";
    }
?>