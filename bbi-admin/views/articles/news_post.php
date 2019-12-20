<?php
require_once('../../includes/common.php');
require_once('../../data/article.php');

$articleClass = new TZGCMS\Admin\Article();

if (isset($_POST['title'], $_POST['content'])) {
    $articleId = $_POST['articleId'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId']:0; 
    $dictionary_id = $_POST['dictionary_id'];
    $thumbnail = $_POST['thumbnail'];
    $imageUrl = isset($_POST['imageUrl']) ? $_POST['imageUrl']:"";
    $background_image =  isset($_POST['background_image']) ? $_POST['background_image']:"";  
    $author = isset($_POST['author']) ? $_POST['author']:"";
    $source = isset($_POST['source']) ? $_POST['source']:"";
    $source_url = isset($_POST['source_url']) ? $_POST['source_url']:""; 
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $summary = $_POST['summary'];
    $pubdate = $_POST['pubdate'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";

    //   echo $content.$productId;
    if($articleId>0){
        echo $articleClass->update_article($articleId, $title, $subtitle, $categoryId,$dictionary_id, $thumbnail, $imageUrl,$background_image,$author,$source,$source_url, $keywords, $active,$recommend, $description, $content,$summary,$pubdate);

    }else{
        echo $articleClass->insert_article($title, $subtitle, $categoryId, $dictionary_id, $thumbnail, $imageUrl,$background_image,$author,$source,$source_url, $keywords, $active,$recommend, $description, $content,$summary,$pubdate);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

