<?php
require_once('../../includes/common.php');
require_once('../../data/article_category.php');

$categoryClass = new TZGCMS\Admin\ArticleCategory();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $categoryClass->delete_category($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}

