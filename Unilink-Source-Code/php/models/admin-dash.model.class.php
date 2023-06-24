<?php
class Admin extends Dbh{
    protected function logs(){
        $stmt = $this->connect()->prepare('SELECT* FROM records;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
    protected function customers(){
        $stmt = $this->connect()->prepare('SELECT* FROM users;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->rowCount();
        return  $results;
    }
    protected function devices(){
        $stmt = $this->connect()->prepare('SELECT* FROM meters;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->rowCount();
        return  $results;
    }
    protected function orders(){
        $stmt = $this->connect()->prepare('SELECT* FROM orders;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->rowCount();
        return  $results;
    }
    protected function messages(){
        $stmt = $this->connect()->prepare('SELECT* FROM messages;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->rowCount();
        return  $results;
    }
    protected function viewOrders(){
        $stmt = $this->connect()->prepare('SELECT* FROM orders;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
}
    protected function getMess(){
        $stmt = $this->connect()->prepare('SELECT* FROM messages;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
    protected function meters(){
        $stmt = $this->connect()->prepare('SELECT* FROM meters;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
    protected function deleteMeter($id){
        $stmt = $this->connect()->prepare('DELETE FROM meters WHERE meterID=?;');
        if(!$stmt->execute(array($id))){
            $stmt = NULL;
            exit();
        }
        header("location:../views/meters.php?delete=true");
        exit();
    }
    protected function addMeter(){
        $stmt = $this->connect()->prepare('INSERT INTO meters (ownerID,status_elec,status_wat,recharge_elec,recharge_wat,bal_elec,bal_wat)VALUES(NULL,0,0,0,0,0,0) ;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        header("location:../views/meters.php?success");
        exit();
    }
    protected function fetchCustomers(){
        $stmt = $this->connect()->prepare('SELECT* FROM users;');
        if(!$stmt->execute()){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
    protected function deleteCustomer($id){
        $stmt = $this->connect()->prepare('DELETE FROM users WHERE user_id=?;');
        if(!$stmt->execute(array($id))){
            $stmt = NULL;
            exit();
        }
        header("location:../views/customers.php?delete=true");
        exit();
    } 
    protected function newOrder($name, $mobile, $email, $adress, $msg){
        $stmt = $this->connect()->prepare('INSERT INTO orders (name,email,mobile,adress,message)VALUES(?,?,?,?,?) ;');
        if(!$stmt->execute(array($name, $email, $mobile,$adress, $msg))){
            $stmt = NULL;
            exit();
        }
        header("location:../views/place-order.php?order_success");
        exit(); 
    }
     protected function getMeterData($meterid){
        $stmt = $this->connect()->prepare('SELECT* FROM meters WHERE meterID=?;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=NULL;
        $stmt = $this->connect()->prepare('UPDATE meters SET recharge_elec = 0, recharge_wat=0 WHERE meterID = ?;');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        return  $results;
        
    }
        protected function updateCons($meterid, $econs, $wcons){
        $stmt = $this->connect()->prepare('INSERT INTO records (meterID,elec_cons,wat_cons)VALUES(?,?,?) ;');
        if(!$stmt->execute(array($meterid,$econs,$wcons))){
            $stmt = NULL;
            exit();
        }
     }
     protected function updateMet($meterid,$estatus, $wstatus, $ebal, $wbal){
        $stmt = $this->connect()->prepare('UPDATE meters SET status_elec = ?, status_wat = ?, bal_elec= ?, bal_wat= ? WHERE meterID = ?;');
        if(!$stmt->execute(array($estatus, $wstatus,$ebal,$wbal, $meterid,))){
            $stmt = NULL;
            exit();
        }
     }

}