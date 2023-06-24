<?php
//manipulating data
class LoginContr extends Login{
    private $password;
    private $meterID;

    public function __construct($password, $meterID){
        $this->password = $password;
        $this->meterID = $meterID;
    }
    public function loginUser(){
        if($this->emptyInput()==false){
            header("Location:../../php/login.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->meterID, $this->password);

     
    }
    //error handling
    private function emptyInput(){
        $result = false;
        if(empty($this->password || $this->meterID)){
            $result = false;
        }
        else $result = true;
        return $result;
    }
    //validation of email
   

}