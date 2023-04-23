<?php
class UserDash extends Dbh{
    protected function getMeterBal($meterid){
        $stmt = $this->connect()->prepare('SELECT* FROM meters WHERE meterID=?');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $ID = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $ID;
    }
    protected function getMeterCons($meterid){
        $stmt = $this->connect()->prepare('SELECT* FROM records WHERE meterID=? ORDER BY update_time DESC LIMIT 1;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $ID = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $ID;
    }

    protected function disableWaterMeter($meterid){
        $stmt = $this->connect()->prepare('UPDATE meters SET status_wat = 0 WHERE meterID = ?;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $stmt=NULL;
    }
    protected function enableWaterMeter($meterid){
        $stmt = $this->connect()->prepare('UPDATE meters SET status_wat = 1 WHERE meterID = ?;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $stmt=NULL;
    }
    protected function disableElecMeter($meterid){
        $stmt = $this->connect()->prepare('UPDATE meters SET status_elec = 0 WHERE meterID = ?;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $stmt=NULL;
    }
    protected function enableElecMeter($meterid){
        $stmt = $this->connect()->prepare('UPDATE meters SET status_elec = 1 WHERE meterID = ?;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $stmt=NULL;
    }

    protected function  getLatestData($meterid){
        $stmt = $this->connect()->prepare('SELECT* FROM records WHERE meterID=? ORDER BY update_time DESC LIMIT 5;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
        
    }

    protected function recharge($meterid,$elecVoucher,$waterVoucher){
        ////////////////////////////////////////////////////////////////
        if(!empty($elecVoucher)){
        $stmt = $this->connect()->prepare('SELECT* FROM vouchers where voucher_code = ? AND type="E";');
        if(!$stmt->execute(array($elecVoucher))){
            $stmt = NULL;
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = NULL;
            header("Location:../views/test.php?error=codenotfound");
            exit();
            //$stmt=NULL;
            }
            else{
            //Get Amount
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $amount=$data[0]['amount'];
            //Set new recharge amount for meter
            $stmt = $this->connect()->prepare('UPDATE meters SET recharge_elec = ? WHERE meterID=?;');
            if(!$stmt->execute(array($amount,$meterid))){
                $stmt = NULL;
                exit();
                }
            //Set voucher as redeemed
            $stmt = $this->connect()->prepare('UPDATE vouchers SET status = "Redeemed" WHERE voucher_code=?;');
            if(!$stmt->execute(array($elecVoucher))){
                $stmt = NULL;
                exit();
                }
            //generate new voucher of the same amount
            $newVoucher=$this->newVoucherCode();
            //insert new voucher into database
            $stmt = $this->connect()->prepare('INSERT INTO vouchers (voucher_code,amount,type) VALUES (?,?,"E");');
            if(!$stmt->execute(array($newVoucher,$amount))){
                $stmt = NULL;
                exit();
                }
            //header("Location:../views/test.php?error=codefound");
            // exit();
            }
        }
            $stmt = NULL;
        ////////////////////////////////////////////////////////////////
        //water
        if(!empty($waterVoucher)){
        $stmt = $this->connect()->prepare('SELECT* FROM vouchers where voucher_code = ? AND type="W";');
        if(!$stmt->execute(array($waterVoucher))){
            $stmt = NULL;
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = NULL;
            header("Location:../views/test.php?error=codenotfound");
            exit();
            //$stmt=NULL;
            }
            else{
            //Get Amount
            $datawater=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $amountWater=$datawater[0]['amount'];
            //Set new recharge amount for meter
            $stmt = $this->connect()->prepare('UPDATE meters SET recharge_wat = ? WHERE meterID=?;');
            if(!$stmt->execute(array($amountWater,$meterid))){
                $stmt = NULL;
                exit();
                }
            //Set voucher as redeemed
            $stmt = $this->connect()->prepare('UPDATE vouchers SET status = "Redeemed" WHERE voucher_code=?;');
            if(!$stmt->execute(array($waterVoucher))){
                $stmt = NULL;
                exit();
                }
            //generate new voucher of the same amount
            $newVoucher=$this->newVoucherCode();
            //insert new voucher into database
            $stmt = $this->connect()->prepare('INSERT INTO vouchers (voucher_code,amount,type) VALUES (?,?,"W");');
            if(!$stmt->execute(array($newVoucher,$amountWater))){
                $stmt = NULL;
                exit();
                }
            //header("Location:../views/test.php?error=codefound");
            // exit();
            }
        }
            header("Location:../views/user-dash.php");
            exit();
        ///////////////////////////////////////////////////////////////////
   
    }
    
    protected function newVoucherCode(){
        $random_digits = array();
        //generate 10 random digits
        for($i=0; $i<10; $i++){
            $random_digits[]= mt_rand(0,9);
            echo $random_digits[$i];
        }
        //concatenate random digits
        $joinDigits=implode('',$random_digits);
        //convert to string to int
        $voucher = intval($joinDigits);
        return $voucher;
    }
   
}