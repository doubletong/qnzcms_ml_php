<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/order.php');

$orderClass = new ShoppingOrder();

if (isset( $_POST['express'], $_POST['expressNo'])) {
    $Id = $_POST['orderId'];
    $express = $_POST['express'];
    $expressNo = $_POST['expressNo'];
    $remark = $_POST['remark'];
    //   echo $content.$linkId;
    if(isset($_POST['orderId'])){
        echo $orderClass->update_order($Id,
            $express, $expressNo, $remark);
    }

}else{
    echo 0;
}

