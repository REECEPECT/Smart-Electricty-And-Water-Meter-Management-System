<?php
class Enquire extends Dbh{
    protected function sendMsg($meterid, $userid, $name, $message){
        $stmt = $this->connect()->prepare('INSERT INTO messages (meter_id,user_id,name,msg) VALUES (?,?,?,?);');
        if(!$stmt->execute(array($meterid, $userid, $name, $message))){
            header("location: ../views/test.php?failed");
            $stmt = NULL;
            exit();
        }
        $stmt=NULL;
        header("location: ../views/enquire.php?sent");
        exit();
    }
}