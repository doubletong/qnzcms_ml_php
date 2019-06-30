<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/page.php');

$pageClass = new Page();

if (isset($_POST['title'], $_POST['content'])) {
    $pageId = $_POST['pageId'];
    $title = $_POST['title'];
    $alias = $_POST['alias'];   
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $background_image = $_POST['background_image'];
    //   echo $content.$productId;

    if($pageId>0){
        echo $pageClass->update_page($pageId, $title,$alias, $keywords, $active, $description, $content,$background_image);
    }else{
        echo $pageClass->insert_page($title, $alias, $keywords, $active, $description, $content,$background_image);
    }
  
}else{
    echo false;
}

