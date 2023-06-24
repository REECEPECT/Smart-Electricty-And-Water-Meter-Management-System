<?php
session_start();
$meterid = $_SESSION['meterid'];
include "../dbhandler/dbh.class.php";
include "../models/user-dash.model.class.php";
include "../controllers/user-dash.contr.class.php";
$balances = new UserDashContr($meterid);
$stat = $_POST['status'];
if($stat=="Water Bal. Status: ON"){
    $balances->setOFFWater($meterid);
    echo "Water Bal. Status: OFF";
}
else{
    $balances->setONWater($meterid);
    echo "Water Bal. Status: ON";
    }
?>