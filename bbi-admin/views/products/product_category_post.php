<?php
require_once('../../includes/common.php');
require_once('../../data/product_category.php');

$caseClass = new  TZGCMS\Admin\ProductCategory();

if (isset($_POST['title'])) {
    $categoryId = $_POST['categoryId'];
    $title = $_POST['title'];
    $title_en = $_POST['title_en'];
    $intro = $_POST['intro'];
    $thumbnail = isset($_POST['thumbnail']) ?$_POST['thumbnail']:""; 
    $thumbnail2 = isset($_POST['thumbnail2']) ?$_POST['thumbnail2']:""; 
    $dictionary_id = isset($_POST['dictionary_id']) ? $_POST['dictionary_id']: 0;
    $parent_id = isset($_POST['parent_id']) ?$_POST['parent_id']:0;
    $importance = $_POST['importance'];
    $active = $_POST['active'];
    //   echo $content.$productId;
    if($categoryId>0){       
        echo  $caseClass->update_category($categoryId, $title,$title_en,$intro,$thumbnail,$thumbnail2, $dictionary_id,$parent_id, $importance,$active);

    }else{
        
        echo $caseClass->insert_category($title,$title_en,$intro,$thumbnail,$thumbnail2, $dictionary_id,$parent_id, $importance,$active);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题不能为空！');
    echo json_encode($result);  
}

