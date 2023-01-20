<?php
include_once "controller/category_controller.php";

$catController=new CategoryController();
$id=$_POST['id'];
//echo $id;
$result=$catController->deleteCategory($id);

if($result){
    echo "success";
}
else{
    echo "fail";
}
?>