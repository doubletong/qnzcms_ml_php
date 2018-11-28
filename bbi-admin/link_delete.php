<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/link.php');

$linkClass = new Link();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $linkClass->delete_link($id);
}else{
    echo false;
}


