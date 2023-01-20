<?php

include_once __DIR__."/../model/product.php";

class ProductController extends Product{
    
    public function getProducts()
    {
        $products=$this->getProductList();
        return $products;
    }

    public function getAllCategories(){
        $allCategories=$this->getAllCategoryList();
        return $allCategories;
    }

    public function addProducts($name,$category,$model,$brand,$color){
        $newProduct=$this->addPdu($name,$category,$model,$brand,$color);
        return $newProduct;
    }
}

?>