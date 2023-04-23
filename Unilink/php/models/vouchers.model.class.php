<?php
class Vouchers extends Dbh{
    protected function getVouchers(){
            $stmt = $this->connect()->prepare('SELECT* FROM vouchers;');
            if(!$stmt->execute()){
                $stmt = NULL;
                exit();
            }
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return  $results;
    }
}