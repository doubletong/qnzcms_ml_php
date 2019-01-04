<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/topics.php');

$topicsClass = new Topics();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $topicsClass->delete_topics($id);
}else{
    echo false;
}


