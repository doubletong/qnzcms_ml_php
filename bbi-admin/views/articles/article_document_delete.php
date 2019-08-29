<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/article_document.php');

$docClass = new ArticleDocument();

//   echo $content.$articleId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $docClass->delete_doc($id);
}else{
    echo false;
}
