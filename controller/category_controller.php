<?php

include_once __DIR__."/../model/category.php";

class CategoryController extends Category{
    
    public function getCategories()
    {
        $categories=$this->getCategoryList();
        return $categories;
    }

    public function getParents()
    {
        $parents=$this->getParentList();
        return $parents;
    }

    public function addCategory($name,$parent){
        $result=$this->addCat($name,$parent);
        return $result;
    }

    public function getCategory($id)
    {
        $categories=$this->getCategoryEdit($id);
        return $categories;
    }

    public function updateCategory($id,$name,$parent)
    {
        $cat=$this->updateCat($id,$name,$parent);
        return $cat;
    }

    public function deleteCategory($id)
    {
        $cat=$this->deleteCat($id);
        //echo $cat;
        return $cat;
    }

    public function getCategoriesPage($page)
    {
        $pages=$this->getPages($page);
        return $pages;
    }
    
}

?>