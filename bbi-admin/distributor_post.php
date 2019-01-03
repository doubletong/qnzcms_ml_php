<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/distributor.php');

$distributorClass = new Distributor();

if (isset($_POST['city'], $_POST['importance'])) {
    $distributorId = $_POST['distributorId'];
    $coordinate = $_POST['coordinate'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $importance = $_POST['importance'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    //   echo $content.$productId;
    if($distributorId>0){
        echo $distributorClass->update_distributor($distributorId, $coordinate, $email, $phone, $city,$address, $active, $importance);

    }else{
        echo $distributorClass->insert_distributor($coordinate, $email, $phone, $city,$address, $active, $importance);

    }

}else{
    echo false;
}

