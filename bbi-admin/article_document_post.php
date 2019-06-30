<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/article_document.php');

$docClass = new ArticleDocument();

if (isset($_POST['article_id'], $_POST['title'], $_POST['importance'])) {

    $documentId = isset($_POST['documentId']) ? $_POST['documentId']:0;
    $title = $_POST['title'];
    $file_url = $_POST['file_url'];
    $importance = $_POST['importance'];  
    $article_id = $_POST['article_id'];   

    // echo $content.$articleId;

    if( $documentId > 0){   
        echo $docClass->update_doc($documentId, $title, $file_url, $importance, $article_id);
    }else{      
        echo $docClass->insert_doc($title, $file_url, $importance, $article_id);
    }

}else{
    echo false;
}

