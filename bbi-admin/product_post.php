<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product.php');

$productClass = new Product();

if (isset($_POST['category_id'], $_POST['title'], $_POST['importance'])) {

    $productId = isset($_POST['productId']) ? $_POST['productId']:0;
    $title = $_POST['title'];
    $importance = $_POST['importance'];
    $thumbnail = $_POST['thumbnail'];
    $image_url = $_POST['image_url'];
    $keywords = $_POST['keywords'];
    $recommend =isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $summary = $_POST['summary']; 
    $category_id = $_POST['category_id'];   
    $video_id = $_POST['video_id'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $specifications = stripslashes($_POST['specifications']);
    $registration = stripslashes($_POST['registration']);
    

 //   echo $content.$productId;
    if(isset($_POST['productId'])){
        echo $productClass->update_product($productId, $title,  $importance, $thumbnail, $image_url, $keywords,$recommend, $active,$summary, 
            $description, $content, $specifications,$registration, $category_id,$video_id); 

    }else{
        echo $productClass->insert_product($title,  $importance, $thumbnail, $image_url, $keywords,$recommend, $active,$summary, 
        $description, $content, $specifications,$registration,$category_id,$video_id);
    }

}else{

    echo false;
}

