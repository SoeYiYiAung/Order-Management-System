<?php
include_once __DIR__."/../includes/db.php";

class Product{
    private $pdo;
    public function getProductList(){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql

        $sql="SELECT * 
        FROM products JOIN categories
        WHERE products.category_id=categories.id"; //sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $prducts=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $prducts;
    }

    public function getAllCategoryList(){
        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from categories";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $categories=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $categories;

    }

    
    public function addPdu($name,$category,$model,$brand,$color){
        $this->pdo=Database::connect();//get connection
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        $sql="insert into products(category_id,pname,model,brand,color) values 
        (:category,:name,:model,:brand,:color)";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql
        
        $statement->bindParam(":category",$category);
        $statement->bindParam(":name",$name);
        //$statement->bindParam(":price",$price);
        $statement->bindParam(":model",$model);
        $statement->bindParam(":brand",$brand);
        $statement->bindParam(":color",$color);

        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    
}
}
?>