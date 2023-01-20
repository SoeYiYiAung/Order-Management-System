<?php
include_once __DIR__."/../includes/db.php";

class Stock{
    private $pdo;
    public function getStockList(){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select stocks.product_id,products.pname,sum(qty) as total_qty
        from stocks JOIN products
        WHERE products.id=stocks.product_id
        GROUP BY stocks.product_id";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $stocks=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $stocks;
    }

    public function getProductList(){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from products";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $stocks=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $stocks;
    }

    
    public function addNewStock($id,$unit_price,$qty,$date){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="insert into stocks(product_id,unit_price,qty,date) values (:id,:unit_price,:qty,:date)";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->bindParam(":id",$id);
        $statement->bindParam(":unit_price",$unit_price);
        $statement->bindParam(":qty",$qty);
        $statement->bindParam(":date",$date);

        //$statement->execute();//execute statement

        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getStockHistoryList($id){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select stocks.id,stocks.product_id,products.pname,unit_price,qty,date
        from stocks JOIN products
        WHERE products.id=stocks.product_id and stocks.product_id=$id";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $stocks=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $stocks;
    }

    public function getFinalPrice($id){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select unit_price
        from stocks JOIN products
        WHERE products.id=stocks.product_id AND products.id=$id";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $stocks=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $stocks;
    }
}
?>