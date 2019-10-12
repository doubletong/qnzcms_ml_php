<?php
require_once('../../includes/common.php');
require_once('../../data/case_category.php');

$caseClass = new TZGCMS\Admin\CaseCategory();

if (isset($_POST['title'], $_POST['title_en'])) {
    $categoryId = $_POST['categoryId'];
    $title = $_POST['title'];
    $title_en = isset( $_POST['title_en'])?$_POST['title_en']:"";
    $imageurl = $_POST['imageurl'];
    $importance = $_POST['importance'];
    $active = $_POST['active'];
    //   echo $content.$productId;
    if($categoryId>0){
        echo  $caseClass->update_case($categoryId, $title, $title_en, $imageurl,$importance,$active);

    }else{
        echo $caseClass->insert_case($title, $title_en, $imageurl,$importance,$active);

    }

}else{
    $result = array ('status'=>2,'message'=>'主题不能为空！');
    echo json_encode($result);  
}

