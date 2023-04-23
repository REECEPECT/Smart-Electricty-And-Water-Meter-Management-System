<?php
session_start();
$meterid = $_SESSION['meterid'];
//and if condition for the submit button
if(isset($_POST['submit'])){
    //grab data
    $elecVoucher = $_POST['elecVoucher'];
    $waterVoucher = $_POST['waterVoucher'];
    //instantiate signup controller
    include "../dbhandler/dbh.class.php";
    include "../models/user-dash.model.class.php";
    include "../controllers/user-dash.contr.class.php";
    $balances = new UserDashContr($meterid);
    $balances->topUp($meterid,$elecVoucher,$waterVoucher);

}
else
echo "error";

