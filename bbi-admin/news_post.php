<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/article.php');

$articleClass = new Article();

if (isset($_POST['title'], $_POST['content'])) {
    $articleId = $_POST['articleId'];
    $title = $_POST['title'];
    $categoryId = $_POST['categoryId'];
    $thumbnail = $_POST['thumbnail'];
    $imageUrl = $_POST['imageUrl'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $summary = $_POST['summary'];
    $pubdate = $_POST['pubdate'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    //   echo $content.$productId;
    if($articleId>0){
        echo $articleClass->update_article($articleId, $title,$categoryId, $thumbnail, $imageUrl, $keywords, $active, $description, $content,$summary,$pubdate);

    }else{
        echo $articleClass->insert_article($title,$categoryId, $thumbnail, $imageUrl, $keywords, $active, $description, $content,$summary,$pubdate);

    }

}else{
    echo false;
}

