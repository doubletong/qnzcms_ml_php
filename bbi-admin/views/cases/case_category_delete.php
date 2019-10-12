<?php
require_once('../../includes/common.php');
require_once('../../data/case_category.php');

$caseClass = new TZGCMS\Admin\CaseCategory();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $caseClass->delete_case($id);
}else{
    echo false;
}


