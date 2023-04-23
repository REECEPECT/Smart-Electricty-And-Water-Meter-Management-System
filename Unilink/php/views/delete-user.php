<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
include "../controllers/admin-dash.contr.class.php";
$dash = new AdminDashContr();
$dash->deleteUser($id);
}
