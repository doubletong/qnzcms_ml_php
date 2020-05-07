<?php
require_once('../../includes/common.php');
require_once('../../data/carousel.php');

$carouselClass = new TZGCMS\Admin\Carousel();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $carouselClass->delete_carousel($id);
}else{
    echo false;
}


