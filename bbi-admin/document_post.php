<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/document.php');

$documentClass = new Document();

if (isset($_POST['title'], $_POST['file_url'])) {
    $documentId = $_POST['documentId'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file_url = $_POST['file_url'];
    $thumbnail = $_POST['thumbnail'];  
    $importance = $_POST['importance'];
    $dictionary_id = $_POST['dictionary_id'];

    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    $filesize = "";
    if (file_exists('..'.$file_url)){
        $filesizeNum = filesize('..'.$file_url);
        $filesize = $documentClass->formatSizeUnits($filesizeNum);
    }
    //return "test";
    //   echo $content.$productId;
    if($documentId>0){
        echo $documentClass->update_document($documentId, $title,$description, $file_url, $filesize, $thumbnail,$importance, $dictionary_id, $active);
    }else{
        echo $documentClass->insert_document($title,$description,$file_url,  $filesize,$thumbnail,$importance,$dictionary_id, $active);
    }

}else{
    echo false;
}

