<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/topics.php');

$topicsClass = new Topics();

if (isset( $_POST['title'])) {
    $topicsId = $_POST['topicsId'];
    $title = $_POST['title'];



    if(isset($_POST['topicsId'])){
        echo $topicsClass->update_topics($topicsId,$title);
    }else{
        echo $topicsClass->insert_topics($title);
    }

}else{
    echo false;
}

