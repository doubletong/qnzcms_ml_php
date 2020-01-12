<?php 
require_once('../../includes/common.php');
require_once('../../data/product_category.php');

$categoryClass = new  TZGCMS\Admin\ProductCategory();


//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $categoryClass->delete_category($id);    
            break;   
        case "active":
            echo $categoryClass->active_category($id);  
            break;
        case "recommend":
            echo $categoryClass->recommend_category($id);  
            break;
        case "copy":
            echo $categoryClass->copy_category($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
?>