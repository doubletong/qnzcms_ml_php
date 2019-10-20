<?php
require_once('../../includes/common.php');
require_once('../../data/case.php');

$caseClass = new TZGCMS\Admin\CaseShow();


//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $caseClass->delete_case($id);    
            break;   
        case "active":
            echo $caseClass->active_case($id);  
            break;
        case "recommend":
            echo $caseClass->recommend_case($id);  
            break;
        case "copy":
            echo $caseClass->copy_case($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
