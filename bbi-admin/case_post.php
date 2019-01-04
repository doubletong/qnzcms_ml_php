<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/case.php');

$caseClass = new CaseShow();

if (isset($_POST['title'], $_POST['category'])) {
    $caseId = $_POST['caseId'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $thumbnail = $_POST['thumbnail'];
   
    //   echo $content.$productId;
    if($caseId>0){
        echo $caseClass->update_case($caseId, $title, $category,  $thumbnail);

    }else{
        echo $caseClass->insert_case($title, $category, $thumbnail);

    }

}else{
    echo false;
}

