<?php
require_once('../../includes/common.php');
require_once('../../data/page.php');

$pageClass = new TZGCMS\Admin\Page();

if (isset($_POST['title'], $_POST['content'])) {
    $pageId = $_POST['pageId'];
    $title = $_POST['title'];
    $alias = $_POST['alias'];   
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $background_image = $_POST['background_image'];
    $importance = $_POST['importance'];
    //   echo $content.$productId;

    if($pageId>0){
        echo $pageClass->update_page($pageId, $title,$alias,$importance, $keywords, $active, $description, $content,$background_image);
    }else{
        echo $pageClass->insert_page($title, $alias, $importance, $keywords, $active, $description, $content,$background_image);
    }
  
}else{
    echo false;
}

