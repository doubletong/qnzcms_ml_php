<?php
require_once('../../includes/common.php');
require_once('../../data/link.php');

$linkClass = new TZGCMS\Admin\Link();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $linkClass->delete_link($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


