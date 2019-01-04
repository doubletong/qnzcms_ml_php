<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/media.php');

$mediaClass = new Media();

if (isset( $_POST['title'], $_POST['link'])) {

    $linkId = $_POST['linkId'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $summary = $_POST['summary'];
    $link = $_POST['link'];
    $topicsId = $_POST['topicsId'];

   //echo $summary.$linkId;
    if(isset($_POST['linkId'])){
        echo $mediaClass->update_media($linkId, $title,$category,$summary,$topicsId, $link);
    }else{
        
        echo $mediaClass->insert_media($title, $category, $summary, $topicsId, $link);
    }

}else{
    echo false;
}

