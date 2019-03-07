<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/subscription.php');

$subscriptionClass = new Subscription();

//   echo $content.$productId;
if(isset($_POST['email'])){
    $email=$_POST['email'];
    echo $subscriptionClass->delete_subscription($email);
}else{
    echo false;
}


