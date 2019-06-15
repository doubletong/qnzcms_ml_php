<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/distributor.php');

$distributorClass = new Distributor();

if (isset($_POST['name'], $_POST['importance'])) {

    

    $distributorId = $_POST['distributorId'];
    $thumbnail = $_POST['thumbnail'];
    $image_url = $_POST['image_url'];
    $name = $_POST['name'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $homepage = $_POST['homepage'];
    $fax = $_POST['fax'];
    $address = $_POST['address'];

    $intro = stripslashes($_POST['intro']);

    $importance = $_POST['importance'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
  
    //   echo $content.$productId;
    if ($distributorId > 0) {
        echo $distributorClass->update_distributor($distributorId,  $thumbnail,$image_url, $name, $postcode, $homepage, $phone, $fax, $address, $active, $importance, $intro);
    } else {
        echo $distributorClass->insert_distributor($thumbnail,$image_url, $name, $postcode, $homepage, $phone, $fax, $address, $active, $importance, $intro);
    }
} else {
    echo false;
}
