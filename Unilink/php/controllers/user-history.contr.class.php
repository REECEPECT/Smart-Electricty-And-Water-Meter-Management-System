<?php
class HistoryContr extends History{
    private $meterid;
    public function __construct($meterid){
        $this->meterid = $meterid;
    }
    public function getData($meterid){
        $results = $this->getHistory($meterid);
        return $results;
    }
}