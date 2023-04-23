<?php
class SendMsgContr extends Enquire{
    private $meterid;
    private $userid;
    private $name;
    private $message;

    public function __construct($meterid, $userid, $name, $message){
        $this->name = $name;
        $this->meterid=$meterid;
        $this->userid=$userid;
        $this->message = $message;
    }
    public function sendDM($meterid, $userid, $name, $message){
        $this->sendMsg($meterid, $userid, $name, $message);
    }
}