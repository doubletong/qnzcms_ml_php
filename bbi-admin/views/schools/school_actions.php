<?php
require_once('../../includes/common.php');
require_once('../../data/major_category.php');
require_once('../../data/major.php');

$majorClass = new TZGCMS\Admin\Major();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $majorClass->delete_major($id);    
            break;   
        case "active":
            echo $majorClass->active_major($id);  
            break;
        case "recommend":
            echo $majorClass->recommend_major($id);  
            break;
        case "copy":
            echo $majorClass->copy_major($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}

//按did获取分类
if( isset($_GET['did']) ){

    $did=$_GET['did'];
    $categoryClass = new TZGCMS\Admin\MajorCategory();
    $result = $categoryClass->fetch_all($did);
    
    echo json_encode($result);  
}