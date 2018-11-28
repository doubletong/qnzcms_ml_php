<?php

require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/order.php');

$orderClass = new ShoppingOrder();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $orderClass->delete_order($id);
}else{
    echo false;
}


