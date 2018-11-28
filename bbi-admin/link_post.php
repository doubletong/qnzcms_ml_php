<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/link.php');

$linkClass = new Link();

if (isset( $_POST['title'], $_POST['importance'])) {
    $linkId = $_POST['linkId'];
    $title = $_POST['title'];
    $importance = $_POST['importance'];
    $imageUrl = $_POST['imageUrl'];
    $link = $_POST['link'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";


    //   echo $content.$linkId;
    if(isset($_POST['linkId'])){
        echo $linkClass->update_link($linkId,
            $title, $importance, $imageUrl, $active,  $link);
    }else{
        echo $linkClass->insert_link($title, $importance, $imageUrl, $active, $link);
    }

}else{
    echo false;
}

