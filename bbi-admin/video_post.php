<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/video.php');

$videoClass = new video();

if (isset($_POST['title'], $_POST['importance'])) {
    $videoId = isset($_POST['videoId'])?$_POST['videoId']:0;
    $title = $_POST['title'];
    $thumbnail = $_POST['thumbnail'];
    $videoUrl = $_POST['videoUrl'];
    $thumbnail2 = isset($_POST['thumbnail2'])  ?  $_POST['thumbnail2'] : "";
    $webm = isset($_POST['webmUrl'])  ?  $_POST['webmUrl'] : ""; 
    $importance = $_POST['importance'];
    $dictionary_id = $_POST['dictionary_id'];
    $content = stripslashes($_POST['content']);
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";

    //   echo $content.$videoId;
    if(isset($_POST['videoId'])){
        echo $videoClass->update_video($videoId, $title, $thumbnail,$videoUrl,$thumbnail2,$webm, $dictionary_id, $content,$importance, $active,$recommend);
    }else{
        echo $videoClass->insert_video($title, $thumbnail,$videoUrl,$thumbnail2,$webm, $dictionary_id, $content,$importance, $active,$recommend);
    }

}else{
    echo false;
}

