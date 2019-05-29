<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/article_category.php');

$caseClass = new ArticleCategory();

if (isset($_POST['title'], $_POST['dictionary_id'])) {
    $categoryId = $_POST['categoryId'];
    $title = $_POST['title'];
    $thumbnail = $_POST['thumbnail'];
    $dictionary_id = $_POST['dictionary_id'];
    $importance = $_POST['importance'];
    $active = $_POST['active'];
    //   echo $content.$productId;
    if($categoryId>0){
        echo  $caseClass->update_category($categoryId, $title,$thumbnail, $dictionary_id, $importance,$active);

    }else{
        echo $caseClass->insert_category($title,$thumbnail, $dictionary_id, $importance,$active);

    }

}else{
    echo false;
}

