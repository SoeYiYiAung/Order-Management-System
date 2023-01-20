<?php
include_once __DIR__."/../includes/db.php";

class Customer{
    private $pdo;
    public function getCustomerList(){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from customers";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $customers=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $customers;
    }

    public function createCustomer($name,$email,$phone,$address)
        {
            $this->pdo=Database::connect();//get connection

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
            
            $sql="insert into customers(name,email,phone,address) values (:name,:email,:phone,:address)";//write sql

            $statement=$this->pdo->prepare($sql);//prepare sql

            $statement->bindParam(":name",$name);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":address",$address);

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
}

    
    
?>