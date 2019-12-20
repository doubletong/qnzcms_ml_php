<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/document.php');

$documentClass = new document();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $documentClass->delete_document($id);    
            break;   
        case "active":
            echo $documentClass->active_document($id);  
            break;
        // case "recommend":
        //     echo $documentClass->recommend_document($id);  
        //     break;
        case "copy":
            echo $documentClass->copy_document($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
