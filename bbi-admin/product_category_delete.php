<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product_category.php');

$categoryClass = new ProductCategory();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $categoryClass->delete_category($id);
}else{
    echo false;
}

