<?php

include_once __DIR__."/../model/order.php";

class OrderController extends Order{
    
    public function getOrders()
    {
        $orders=$this->getOrderList();
        return $orders;
    }
}

?>