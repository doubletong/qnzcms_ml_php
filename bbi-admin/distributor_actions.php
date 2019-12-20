<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/distributor.php');

$distributorClass = new distributor();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $distributorClass->delete_distributor($id);    
            break;   
        case "active":
            echo $distributorClass->active_distributor($id);  
            break;
        // case "recommend":
        //     echo $distributorClass->recommend_distributor($id);  
        //     break;
        case "copy":
            echo $distributorClass->copy_distributor($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
