<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/document.php');

$documentClass = new Document();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $documentClass->delete_document($id);
}else{
    echo false;
}


