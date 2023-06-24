<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$meterid = $_SESSION['meterid'];
class UpdateContr extends Update{
    private $meterid;
    
    public function __construct($meterID){
        $this->meterid=$meterID;
    }
    public function getUserInfor($meterid){
       return $this->userInfo($meterid);
    }
}

class Updatecontroller extends Update{
    private $name;
    private $email;
    private $mobile;
    private $pwrep;
    private $password;
    private $adress;
    private $userid;
    public function __construct($name, $email, $mobile, $pwrep, $password, $adress, $userid){
        $this->name=$name;
        $this->email=$email;
        $this->mobile=$mobile;
        $this->adress=$adress;
        $this->password=$password;
        $this->pwrep=$pwrep;
        $this->userid=$userid;
    }

    private function emptyInput(){
        $result = false;
        if(empty($this->mobile) || empty($this->name) || empty($this->email) || empty($this->adress) || empty($this->password || $this->pwrep )){
            $result = false;
        }
        else $result = true;
        return $result;
    }
    //validation of email
    private function invalidEmail(){
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else $result = true;
        return $result;
    }
    //match password
    private function pwdMatch(){
        $result = false;
        if($this->password !== $this->pwrep){
            $result = false;
        }
        else $result = true;
        return $result;
    }
    public function newInfo(){
        if($this->emptyInput()==false){
            header("Location:../views/user-dash.php?error=emptyinput");
            exit();
        }

        if($this->invalidEmail()==false){
            header("Location:../views/user-dash.php?error=invalidemail");
            exit();
        }
        if($this->pwdMatch()==false){
            header("Location:../views/user-dash.php?error=passwordsdontmatch");
            exit();
        }

        $this->updateUser($this->name, $this->email, $this->adress, $this->password, $this->mobile, $this->userid);
       // $this->setOwner($this->meterID);
    }
    //error handling

}
