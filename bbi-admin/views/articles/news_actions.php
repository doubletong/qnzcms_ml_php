<?php
require_once('../../includes/common.php');
require_once('../../data/article.php');

$articleClass = new TZGCMS\Admin\Article();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $articleClass->delete_article($id);    
            break;   
        case "active":
            echo $articleClass->active_article($id);  
            break;
        case "recommend":
            echo $articleClass->recommend_article($id);  
            break;
        case "copy":
            echo $articleClass->copy_article($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
