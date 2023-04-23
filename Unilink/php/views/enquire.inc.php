<?php
session_start();
$meterid = $_SESSION['meterid'];
include "../dbhandler/dbh.class.php";
include "../models/update-user-info.model.class.php";
include "../controllers/update-user-info.contr.class.php";
include "../models/enquire.model.class.php";
include "../controllers/enquire.contr.class.php";
$update = new UpdateContr($meterid);
$results=$update->getUserInfor($meterid);
$name = $results[0]["name"];
$email = $results[0]["email"];
$mobile = $results[0]['mobile'];
$adress= $results[0]["adress"];
$userid= $results[0]["user_id"];
if(isset($_POST['submit'])){
    //grab data
$message = $_POST['msg'];
$msg = new SendMsgContr($meterid, $userid, $name, $message);
$msg->sendDM($meterid, $userid, $name, $message);

}
?>