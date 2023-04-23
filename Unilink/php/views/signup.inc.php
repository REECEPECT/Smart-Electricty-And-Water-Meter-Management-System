<?php
//and if condition for the submit button
if(isset($_POST['submit'])){
    //grab data
    if(isset($_POST['agree'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $meterID = $_POST['meterID'];
    $adress= $_POST['adress'];
    $password = $_POST['password'];
    $rpassword = $_POST['reppassword'];
    $mobile = $_POST['mobile'];

    //instantiate signup controller
    include "../dbhandler/dbh.class.php";
    include "../models/signup.model.class.php";
    include "../controllers/signup.contr.class.php";
    $signup = new SignupContr($name, $email, $adress, $password, $rpassword, $meterID, $mobile);
    $signup->signupUser();
    }
    else
    header("Location:../login.php?accept?privacy_policy");
    exit();

}
else
echo "error";

