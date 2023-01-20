<?php
include_once __DIR__."/../includes/db.php";

class Order{
    private $pdo;
    public function getOrderList(){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from orders";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $orders=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $orders;
    }
}
?>