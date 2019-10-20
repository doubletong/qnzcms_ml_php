<?php
require_once('../../includes/common.php');
require_once('../../data/product.php');

$productClass = new TZGCMS\Admin\Product();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $productClass->delete_product($id);    
            break;   
        case "active":
            echo $productClass->active_product($id);  
            break;
        case "recommend":
            echo $productClass->recommend_product($id);  
            break;
        case "copy":
            echo $productClass->copy_product($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
