<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product_document.php');

$docClass = new ProductDocument();

if (isset($_POST['product_id'], $_POST['title'], $_POST['importance'])) {

    $documentId = isset($_POST['documentId']) ? $_POST['documentId']:0;
    $title = $_POST['title'];
    $file_url = $_POST['file_url'];
    $address = $_POST['address'];
    $importance = $_POST['importance'];  
    $product_id = $_POST['product_id'];   
    $dictionary_id = $_POST['dictionary_id'];

    // echo $content.$productId;

    if( $documentId > 0){   
        echo $docClass->update_doc($documentId, $title, $file_url, $importance, $address, $product_id,$dictionary_id);
    }else{      
        echo $docClass->insert_doc($title, $file_url, $importance, $address, $product_id, $dictionary_id);
    }

}else{
    echo false;
}

