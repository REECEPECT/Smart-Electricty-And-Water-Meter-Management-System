<?php
session_start();
$meterid = $_SESSION['meterid'];
include "../dbhandler/dbh.class.php";
include "../models/user-dash.model.class.php";
include "../controllers/user-dash.contr.class.php";
$balances = new UserDashContr($meterid);
$stat = $_POST['status'];
if($stat=="Electricity Bal. Status: 1"){
    $balances->setOFFElec($meterid);
    echo "Electricity Bal. Status: 0";
}
else{
    $balances->setONElec($meterid);
    echo "Electricity Bal. Status: 1";
    }
?>