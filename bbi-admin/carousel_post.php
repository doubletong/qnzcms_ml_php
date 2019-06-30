<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/carousel.php');

$carouselClass = new Carousel();

if (isset( $_POST['title'], $_POST['importance'])) {
    $carouselId = $_POST['carouselId'];
    $title = $_POST['title'];
    $importance = $_POST['importance'];
    $imageUrl = $_POST['imageUrl'];
    $image_url_mobile  = $_POST['image_url_mobile'];
    $link = $_POST['link'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $description = $_POST['description'];

    //   echo $content.$carouselId;
    if(isset($_POST['carouselId'])){
        echo $carouselClass->update_carousel($carouselId,
            $title, $importance, $imageUrl,$image_url_mobile, $active, $description, $link);
    }else{
        echo $carouselClass->insert_carousel($title, $importance, $imageUrl,$image_url_mobile, $active, $description, $link);
    }

}else{
    echo false;
}

