<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/shop.php');

$shopClass = new Shop();

if (isset($_POST['title'], $_POST['importance'])) {
    $shopId = $_POST['shopId'];
    $title = $_POST['title'];
    $address = $_POST['address'];
    $authorization_no = $_POST['authorization_no'];
    $link = $_POST['link'];
    $importance = $_POST['importance'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    //   echo $content.$productId;
    if($shopId>0){
        echo $shopClass->update_shop($shopId, $title, $address, $authorization_no,$link, $active, $importance);
    }else{
        echo $shopClass->insert_shop($title, $address, $authorization_no,$link, $active, $importance);
    }

}else{
    echo false;
}

