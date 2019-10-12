<?php
require_once('../../includes/common.php');
require_once('../../data/article_category.php');

$caseClass = new TZGCMS\Admin\ArticleCategory();

if (isset($_POST['title'], $_POST['dictionary_id'])) {
    $categoryId = $_POST['categoryId'];
    $title = $_POST['title'];
    $thumbnail = isset($_POST['thumbnail']) ? $_POST['thumbnail']:"";  
    $thumbnail2 =  isset($_POST['thumbnail2']) ?$_POST['thumbnail2']:""; 
    $dictionary_id =  $_POST['dictionary_id'];
    $parent_id = isset($_POST['parent_id']) ?$_POST['parent_id']:0;
    $importance = $_POST['importance'];
    $active = $_POST['active'];
   
    //   echo $content.$productId;
    if($categoryId>0){
        echo  $caseClass->update_category($categoryId, $title,$thumbnail, $thumbnail2, $dictionary_id,$parent_id, $importance,$active);

    }else{
        echo $caseClass->insert_category($title,$thumbnail, $thumbnail2, $dictionary_id,$parent_id,  $importance,$active);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题不能为空！');
    echo json_encode($result);  
}

