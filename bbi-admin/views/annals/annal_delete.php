<?php
require_once('../../includes/common.php');
require_once('../../data/annal.php');

$annalClass = new TZGCMS\Admin\Annal();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $annalClass->delete_annal($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


