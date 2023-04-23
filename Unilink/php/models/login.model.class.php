<?php
//for queries
class Login extends Dbh{

    protected function getUser($meterID, $password){
        //get user id from metering device tables
        $stmt = $this->connect()->prepare('SELECT ownerID FROM meters WHERE meterID = ?;');

        if(!$stmt->execute(array($meterID))){
            $stmt = NULL;
            header("Location:../../php/login.php?couldntfindowner");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt = NULL;
            header("Location:../../php/login.php?error=nosuchdevice");
            exit();
        }
        $owner = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ownerID = $owner[0]["ownerID"];
        ////////////////////////////////////////////////////////////////
        $stmt = $this->connect()->prepare('SELECT pass FROM users WHERE user_id = ?;');

        if(!$stmt->execute(array($ownerID))){
            $stmt = NULL;
            header("Location:../../php/login.php?getUserStmtFailed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt = NULL;
            header("Location:../../php/login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($password, $pwdHashed[0]["pass"]);

        if($checkpwd==false){
            $stmt = NULL;
            header("Location:../../php/login.php?error=wrongpassword");
            exit();
        }
        else if($checkpwd==true){
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id = ? AND pass = ?;'); 
        if(!$stmt->execute(array($ownerID, $pwdHashed[0]["pass"]))){
            $stmt = NULL;
            header("Location:../../php/login.php?failed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt = NULL;
            header("Location:../../php/login.php?nouser");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['meterID'] = $user[0]["meterID"];
       // $_SESSION['userID'] = $user[0]["userID"];
        $stmt = NULL;
        header("Location:user-dash.php");
        exit();
        }
        $stmt=NULL;
    }
    }
