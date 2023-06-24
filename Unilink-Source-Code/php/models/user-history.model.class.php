<?php
class History extends Dbh{
    protected function getHistory($meterid){
        $stmt = $this->connect()->prepare('SELECT* FROM records WHERE meterID=?');
        if(!$stmt->execute(array($meterid))){
            $stmt = NULL;
            exit();
        }
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}