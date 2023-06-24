<?php
session_start();
//$meterid = $_SESSION['meterid'];

//and if condition for the submit button
if(isset($_POST['submit'])){
    //grab data
    $meterID = $_POST['meterID'];
    $password = $_POST['Password'];
    //$meterid = $_SESSION['meterid'];
    if($meterID=="Admin" && $password=="unilink2023"){
        $_SESSION['admin']="Admin";
        header("location:admin-dash.php");
        exit();
    }
    $_SESSION['meterid']=$meterID;
    //instantiate signup controller
    include "../dbhandler/dbh.class.php";
    include "../models/login.model.class.php";
    include "../controllers/login.contr.class.php";
    $login = new LoginContr($password, $meterID);
    $login->loginUser();

//$_SESSION['meterID']=$_POST['meterID'];
    //header("Location: ../../php/login.php?error=userloggedin");
}
else
echo "error";

