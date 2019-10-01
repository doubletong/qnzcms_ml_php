<?php
require_once('../../includes/common.php');
require_once('../../data/major_category.php');

$caseClass = new TZGCMS\Admin\MajorCategory();

if (isset($_POST['title'], $_POST['dictionary_id'])) {

    $categoryId = $_POST['categoryId'];
    $title = $_POST['title'];   
    $dictionary_id =  $_POST['dictionary_id'];  
    $importance = $_POST['importance'];
    $active = $_POST['active'];    
 
    if($categoryId>0){
        echo  $caseClass->update_category($categoryId, $title,$dictionary_id,$importance,$active);

    }else{
        echo $caseClass->insert_category($title, $dictionary_id, $importance,$active);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题不能为空！');
    echo json_encode($result);  
}

