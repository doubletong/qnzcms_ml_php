<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/media.php');

$mediaClass = new Media();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $mediaClass->delete_media($id);
}else{
    echo false;
}


