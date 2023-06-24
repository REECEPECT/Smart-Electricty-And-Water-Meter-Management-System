<?php
// Get name and salary data from server
$meterid = $_POST['meterid'];
$ebal = $_POST['ebal'];
$wbal = $_POST['wbal'];
$estatus = $_POST['estatus'];
$wstatus = $_POST['wstatus'];
$econs = $_POST['econs'];
$wcons = $_POST['wcons'];

include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
//include "../controllers/admin-dash.contr.class.php";
//the following code is responsible for fetching data from the database
//$meterid = $_GET['id'];
class PutData extends Admin{
    public function UpdateConsumption($meterid, $econs, $wcons){
       $this->updateCons($meterid, $econs, $wcons);
    }
    public function UpdateMeters($meterid,$estatus, $wstatus, $ebal, $wbal){
        $this->updateMet($meterid,$estatus, $wstatus, $ebal, $wbal);
     }
}
$updateObj = new PutData;
$updateObj->UpdateConsumption($meterid, $econs, $wcons);
$updateObj->UpdateMeters($meterid,$estatus, $wstatus, $ebal, $wbal);
// Do something with name and salary data
/*echo "eBalance: " . $ebal . "<br>";
echo "wBalance: " . $wbal . "<br>";
echo "econs: " . $ebal . "<br>";
echo "wcons: " . $wbal . "<br>";
echo "econs: " . $ebal . "<br>";
echo "meterid: " . $meterid . "<br>";*/
//echo "Salary: " . $salary . "<br>";
//echo "meterid: " . $meterid+1 . "<br>";
