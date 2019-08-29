<?php
require_once('../../includes/common.php');
require_once('../../data/article.php');

$articleClass = new TZGCMS\Admin\Article();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $articleClass->delete_article($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


