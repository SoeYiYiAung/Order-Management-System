<?php
include_once __DIR__."/../includes/db.php";

class Category{
    private $pdo;
    public function getCategoryList(){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from categories";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $categories=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $categories;
    }

    public function getParentList(){

        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from categories where parent=0";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $parents=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $parents;
    }

    public function addCat($name,$parent){
            $this->pdo=Database::connect();//get connection

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
            
            $sql="insert into categories(name,parent) values (:name,:parent)";//write sql

            $statement=$this->pdo->prepare($sql);//prepare sql

            $statement->bindParam(":name",$name);
            $statement->bindParam(":parent",$parent);

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

    public function getCategoryEdit($id){
        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from categories where id=:id";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql
        $statement->bindParam(":id",$id);
        $statement->execute();//execute statement

        $categories=$statement->fetch(PDO::FETCH_ASSOC);//result

        return $categories;
    }

    public function updateCat($id,$name,$parent){
        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="update categories set name=:name, parent=:parent where id=:id";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql
        $statement->bindParam(":id",$id);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":parent",$parent);
        
        return $statement->execute();//execute statement

    }

    public function deleteCat($id){
        try{
            $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="delete from categories where id=:id";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql
        $statement->bindParam(":id",$id);

            //
       
        $sql1="select * from categories where parent=:id";//write sql
        $statement1=$this->pdo->prepare($sql1);//prepare sql
        $statement1->bindParam(":id",$id);
        $statement1->execute();
        $children=$statement1->fetchAll(PDO::FETCH_ASSOC);
        if(count($children)>0){
            return false;
        }
        else{
            return $statement->execute();//execute statement
        }
            //
        
        }
        
        catch(PDOException $e)
        {
            return false;
        }
        

    }

    public function getPages($page){
        $items_per_page=7;
        $offset=($page-1)*$items_per_page;
        $this->pdo=Database::connect();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from categories limit $offset,$items_per_page";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $categories=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $categories;
    
    }

    

}
?>