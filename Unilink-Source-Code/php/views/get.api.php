<?php
include "../dbhandler/dbh.class.php";
include "../models/admin-dash.model.class.php";
//include "../controllers/admin-dash.contr.class.php";
//the following code is responsible for fetching data from the database
$meterid = 00001;
class GetData extends Admin{
    private $meterid;
    public function __construct($meter){
        $this->meterid = $meter;
    }
    public function getData($meterid){
       $results = $this->getMeterData($meterid);
       return $results;
    }
}
$obj = new GetData($meterid);
$balances = $obj->getData($meterid);
$response = json_encode($balances);
header('content-type: application/jason');
echo $response;