<?php
require_once('../../includes/common.php');
require_once('../../data/carousel.php');

$carouselClass = new TZGCMS\Admin\Carousel();

if (isset( $_POST['title'], $_POST['importance'])) {
    $carouselId = $_POST['carouselId'];
    $title = $_POST['title'];
    $position_id = $_POST['position_id'];
    $importance = $_POST['importance'];
    $imageUrl = $_POST['imageUrl'];
    $image_url_mobile  = $_POST['image_url_mobile'];
    $link = $_POST['link'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $description = $_POST['description'];

    //   echo $content.$carouselId;
    if($_POST['carouselId']>0){
        echo $carouselClass->update_carousel($carouselId,
            $title, $position_id,  $importance, $imageUrl,$image_url_mobile, $active, $description, $link);
    }else{
        echo $carouselClass->insert_carousel($title, $position_id,  $importance, $imageUrl,$image_url_mobile, $active, $description, $link);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

