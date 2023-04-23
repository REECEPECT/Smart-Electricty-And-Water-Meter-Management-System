<?php
class AdminDashContr extends Admin{
    public function getLogs(){
        $results = $this->logs();
        return $results;
    }
    public function getCustomers(){
        $results = $this->customers();
        return $results;
    }
    public function getDevices(){
        $results = $this->devices();
        return $results;
    }
    public function getOrders(){
        $results = $this->orders();
        return $results;
    }
    public function getMessages(){
        $results = $this->messages();
        return $results;
    }
    public function viewOrders(){
        $results = $this->viewOrders();
        return $results;
    }
    public function getMsgs(){
        $results = $this->getMess();
        return $results;
    }
    public function getMeters(){
        $results = $this->meters();
        return $results;
    }

    public function deleteDevice($id){
        $this->deleteMeter($id);
    }
    public function addDevice(){
        $this->addMeter();
    }
    public function viewCustomers(){
        $results = $this->fetchCustomers();
        return $results;
    }
    public function deleteUser($id){
        $this->deleteCustomer($id);
    }
}