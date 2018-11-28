<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/distributor.php');

$distributorClass = new Distributor();

if (isset($_POST['title'], $_POST['importance'])) {
    $distributorId = $_POST['distributorId'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $importance = $_POST['importance'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    //   echo $content.$productId;
    if($distributorId>0){
        echo $distributorClass->update_distributor($distributorId, $title, $category_id, $phone, $city,$address, $active, $importance);

    }else{
        echo $distributorClass->insert_distributor($title, $category_id, $phone, $city,$address, $active, $importance);

    }

}else{
    echo false;
}

