<?php

include_once __DIR__."/../model/stock.php";

class StockController extends Stock{
    
    public function getStocks()
    {
        $stocks=$this->getStockList();
        return $stocks;
    }

    public function getProducts()
    {
        $products=$this->getProductList();
        return $products;
    }

    public function addStock($id,$unit_price,$qty,$date)
    {
        $sto=$this->addNewStock($id,$unit_price,$qty,$date);
        return $sto;
    }

    public function getStockHistory($id)
    {
        $stocks=$this->getStockHistoryList($id);
        return $stocks;
    }

    public function getPrice($id)
    {
        $stocks=$this->getFinalPrice($id);
        return $stocks;
    }

    
    
    
}
?>
