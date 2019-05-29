<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/article.php');

$articleClass = new Article();

if (isset($_POST['title'], $_POST['content'])) {
    $articleId = $_POST['articleId'];
    $title = $_POST['title'];
    $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId']:0; 
    $dictionary_id = $_POST['dictionary_id'];
    $thumbnail = $_POST['thumbnail'];
    $imageUrl = isset($_POST['imageUrl']) ? $_POST['imageUrl']:"";
    $background_image =  isset($_POST['background_image']) ? $_POST['background_image']:"";  
    $author = $_POST['author'];
    $source = $_POST['source'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $summary = $_POST['summary'];
    $pubdate = $_POST['pubdate'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    //   echo $content.$productId;
    if($articleId>0){
        echo $articleClass->update_article($articleId, $title,$categoryId,$dictionary_id, $thumbnail, $imageUrl,$background_image,$author,$source, $keywords, $active, $description, $content,$summary,$pubdate);

    }else{
        echo $articleClass->insert_article($title,$categoryId, $dictionary_id, $thumbnail, $imageUrl,$background_image,$author,$source, $keywords, $active, $description, $content,$summary,$pubdate);
    }

}else{
    echo false;
}

