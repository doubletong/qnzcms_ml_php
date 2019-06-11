<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/document.php');

$documentClass = new Document();

if (isset($_POST['title'], $_POST['file_url'])) {
    $documentId = $_POST['documentId'];
    $title = $_POST['title'];
    $file_url = $_POST['file_url'];
    $thumbnail = $_POST['thumbnail'];  
    $importance = $_POST['importance'];
    $dictionary_id = $_POST['dictionary_id'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
  
    //return "test";
    //   echo $content.$productId;
    if($documentId>0){
        echo $documentClass->update_document($documentId, $title,$file_url, $thumbnail,$importance, $dictionary_id, $active);
    }else{
        echo $documentClass->insert_document($title,$file_url, $thumbnail,$importance,$dictionary_id, $active);
    }

}else{
    echo false;
}

