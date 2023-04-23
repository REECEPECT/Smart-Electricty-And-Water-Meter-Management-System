<?php
$userid = $_GET['userid'];
if(isset($_POST['submit'])){
    //grab data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $adress = $_POST['adress'];
    $password = $_POST['newpw'];
    $pwrep = $_POST['confirmpw'];
    //instantiate signup controller
    include "../dbhandler/dbh.class.php";
    include "../models/update-user-info.model.class.php";
    include "../controllers/update-user-info.contr.class.php";
    $update = new Updatecontroller($name, $email, $mobile, $pwrep, $password, $adress, $userid);
    //header("Location: test.php?username=".$name);
    $update->newInfo();
}

else
echo "error";



