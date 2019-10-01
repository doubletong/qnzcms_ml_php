<?php
require_once('../../includes/common.php');
require_once('../../data/menu.php');

$menuClass = new TZGCMS\Admin\Menu();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $menuClass->delete_menu($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


