<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/case.php');

$caseClass = new CaseShow();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $caseClass->delete_case($id);
}else{
    echo false;
}


