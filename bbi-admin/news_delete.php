<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/article.php');

$articleClass = new Article();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $articleClass->delete_article($id);
}else{
    echo false;
}


