<?php
require_once('../../includes/common.php');
require_once('../../data/chronicle.php');

$chronicleClass = new TZGCMS\Admin\Chronicle();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $chronicleClass->delete_chronicle($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


