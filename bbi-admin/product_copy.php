<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product.php');

$productClass = new Product();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $productClass->copy_product($id);
}else{
   echo false;
}


