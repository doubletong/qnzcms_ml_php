<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/video.php');

$videoClass = new Video();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $videoClass->delete_video($id);
}else{
    echo false;
}


