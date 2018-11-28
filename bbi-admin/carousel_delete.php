<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/carousel.php');

$carouselClass = new Carousel();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $carouselClass->delete_carousel($id);
}else{
    echo false;
}


