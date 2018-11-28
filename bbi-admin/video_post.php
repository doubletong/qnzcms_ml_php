<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/video.php');

$videoClass = new video();

if (isset($_POST['title'], $_POST['importance'])) {
    $videoId = $_POST['videoId'];
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $productName = $_POST['productName'];
    $thumbnail = $_POST['thumbnail'];
    $videoUrl = $_POST['videoUrl'];
    $ogv = $_POST['ogvUrl'];
    $webm = $_POST['webmUrl'];
    $importance = $_POST['importance'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    //   echo $content.$videoId;
    if(isset($_POST['videoId'])){
        echo $videoClass->update_video($videoId, $title, $sub_title,$productName, $thumbnail,$videoUrl,$ogv,$webm, $keywords, $description, $content,$importance, $active);

    }else{
        echo $videoClass->insert_video($title, $sub_title,$productName,$thumbnail,$videoUrl,$ogv,$webm, $keywords, $description, $content,$importance, $active);

    }

}else{
    echo false;
}

