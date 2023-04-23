<?php
if(isset($_POST['submit'])){
    include "../dbhandler/dbh.class.php";
    include "../models/admin-dash.model.class.php";
    include "../controllers/admin-dash.contr.class.php";
    $dash = new AdminDashContr();
    $dash->addDevice();
    }
    else echo "error";