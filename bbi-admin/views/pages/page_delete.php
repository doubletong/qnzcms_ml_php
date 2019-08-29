<?php
require_once('../../includes/common.php');
require_once('../../data/page.php');

$pageClass = new TZGCMS\Admin\Page();

if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $pageClass->delete_page($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


