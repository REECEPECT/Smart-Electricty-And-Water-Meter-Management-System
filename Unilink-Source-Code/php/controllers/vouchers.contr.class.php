<?php
class vouchersContr extends Vouchers{
    public function vouchers(){
        $results = $this->getVouchers();
        return $results;
    }
}