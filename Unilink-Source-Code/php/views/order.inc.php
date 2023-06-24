<?php
//and if condition for the submit button
if(isset($_POST['submit'])){
    //grab data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $adress= $_POST['adress'];
    $msg = $_POST['message'];
    //instantiate signup controller
    include "../dbhandler/dbh.class.php";
    include "../models/admin-dash.model.class.php";
    include "../controllers/admin-dash.contr.class.php";
    $order = new AdminDashContr();
    $order->placeOrder($name, $mobile, $email, $adress, $msg);
}
else
echo "error";

