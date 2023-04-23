<?php

class Update extends Dbh{
    protected function userInfo($meterID){

        $stmt = $this->connect()->prepare('SELECT ownerID FROM meters WHERE meterID=?');
        if(!$stmt->execute(array($meterID))){
            $stmt = NULL;
            exit();
        }
        $ID = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ownerID = $ID[0]["ownerID"];
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id = ?;');
        if(!$stmt->execute(array($ownerID))){
            $stmt = NULL;
            exit();
        }
       return  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt=NULL;
       // $name = $results[0]["name"];
        //header("location:../views/test.php?".$name);
        //exit();
    }
    protected function updateUser($name, $email, $adress, $password, $mobile, $userid){
        $stmt = $this->connect()->prepare('UPDATE users SET name = ?, email= ?, adress= ?, mobile= ?, pass=? WHERE user_id = ?;');
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($name,$email,$adress,$mobile,$hashedpwd,$userid))){
            $stmt = NULL;
            exit();
        }
        $stmt=NULL;
        header("location:../views/user-dash.php?update=success");
        exit();
    }
}


