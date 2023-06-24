<?php
class OrdersContr extends Admin{

    public function orders(){
        $results= $this->viewOrders();
        return $results;
    }

}