<?php
//for queries
class Signup extends Dbh{
    //check if account under the meter ID provided exists
    protected function checkOwner($meterID){
        $stmt = $this->connect()->prepare('SELECT ownerID FROM meters WHERE meterID = ?;');
        if(!$stmt->execute(array($meterID))){
            $stmt = NULL;
            exit();
        }
        $results = false;
        if($stmt->rowCount() > 0){
            //$validate = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //$ownerID = $validate[0]["ownerID"];
            //if($ownerID=="")
            return true;
        }
        else $results=false;
        return $results;
    }
    //check if meter device exists
    protected function checkMeter($meterID){
        $stmt = $this->connect()->prepare('SELECT meterID FROM meters WHERE meterID = ?;');
        if(!$stmt->execute(array($meterID))){
            $stmt = NULL;
            exit();
        }
        $results = false;
        if($stmt->rowCount() > 0){
            $results = true;
        }
        else $results = false;
        return $results;
    }

    protected function setUser($name, $email, $meterID, $adress, $password,$mobile){
        $stmt = $this->connect()->prepare('INSERT INTO users (name,email,adress,pass,mobile) VALUES (?,?,?,?,?);');
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $email, $adress, $hashedpwd,$mobile))){
            $stmt = NULL;
            exit();
        }
        $stmt=NULL;

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');
        if(!$stmt->execute(array($email))){
            $stmt = NULL;
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = NULL;
            header("Location:../../php/login.php?ownernotfound");
            exit();
        }
    
        $ID = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ownerID = $ID[0]["user_id"];

        $stmt = $this->connect()->prepare('UPDATE meters SET ownerID = ? WHERE meterID = ?;');
        if(!$stmt->execute(array($ownerID, $meterID))){
            $stmt = NULL;
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = NULL;
            ?>
        <div id="liveAlertPlaceholder"></div>
        <button type="button" class="btn btn-primary" id="liveAlertBtn">Account Created Successfully</button>
       <?php
            header("Location:../../php/login.php?cantfindthedevice");
            exit();
        }
        
        header("Location: ../../php/login.php?success");
        
    }


    
        //session_start();
        //$_SESSION['meterID'] = $user[0]["meterID"];
       // $_SESSION['userID'] = $user[0]["userID"];
       
       //header("Location:../../php/login.php?successfull".$user[0]["user_id"]);
        //exit();

        //assign ownership of device to user
       

    }
    

