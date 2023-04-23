<?php
class UserDashContr extends UserDash{
    private $meterid;
    public function __construct($meterid){
        $this->meterid;
    }
    public function MeterBal($meterid){
       return $results = $this->getMeterBal($meterid);
       // $water = $results[0]["bal_wat"];
      // header("location:../views/test.php?water2=" . $water);
        //exit();
    }
    public function MeterCons($meterid){
        return $results = $this->getMeterCons($meterid);
    }

    public function setOFFWater($meterid){
        $this->disableWaterMeter($meterid);
    }
    public function setOFFElec($meterid){
        $this->disableElecMeter($meterid);
    }
    
    public function setONWater($meterid){
        $this->enableWaterMeter($meterid);
    }
    public function setONElec($meterid){
        $this->enableElecMeter($meterid);
    }
    public function latest($meterid){
        $results = $this->getLatestData($meterid);
        return $results;
    }

    public function topUp($meterid,$elecVoucher,$waterVoucher){
        $this->recharge($meterid,$elecVoucher,$waterVoucher);
    }

}