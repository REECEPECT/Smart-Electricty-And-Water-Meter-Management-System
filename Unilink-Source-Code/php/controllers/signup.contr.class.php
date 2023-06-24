<?php
//manipulating data
class SignupContr extends Signup{
    private $name;
    private $email;
    private $adress;
    private $password;
    private $reppassword;
    private $meterID;

    private $mobile;

    public function __construct($name, $email, $adress, $password, $reppassword, $meterID, $mobile){
        $this->name = $name;
        $this->email = $email;
        $this->adress = $adress;
        $this->password = $password;
        $this->reppassword = $reppassword;
        $this->meterID = $meterID;
        $this->mobile = $mobile;
    }
    public function signupUser(){
        if($this->emptyInput()==false){
            header("Location:../../php/login.php?error=emptyinput");
            exit();
        }

        if($this->invalidEmail()==false){
            header("Location:../../php/login.php?error=invalidemail");
            exit();
        }
        if($this->pwdMatch()==false){
            header("Location:../../php/login.php?error=passwordsdontmatch");
            exit();
        }
        if($this->checkOwnerExist()==false){
            header("Location:../../php/login.php?error=ownerExists");
            exit();
        }
        if($this->checkMeterExist()==false){
            header("Location:../../php/login.php?error=devicenotfound");
            exit();
        }
        $this->setUser($this->name, $this->email, $this->meterID, $this->adress, $this->password, $this->mobile);
       // $this->setOwner($this->meterID);
    }
    //error handling
    private function emptyInput(){
        $result = false;
        if(empty($this->mobile || $this->name || $this->email || $this->adress || $this->password || $this->reppassword || $this->meterID)){
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
        if($this->password !== $this->reppassword){
            $result = false;
        }
        else $result = true;
        return $result;
    }

    private function checkOwnerExist(){
        $result = false;
        if(!$this->checkOwner($this->meterID)){
            $result = false;
        }
        else $result = true;
        return $result;
    }

    private function checkMeterExist(){
        $result = false;
        if(!$this->checkMeter($this->meterID)){
            $result = false;
        }
        else $result = true;
        return $result;
    }

}