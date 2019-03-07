<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/Subscription.php");

$subscribe = new Subscription();

if(isset($_GET['email'])){
    $email = $_GET['email'];
    
    $issubcribe = $subscribe->check_email($email);
    if($issubcribe){
        echo "您已经订阅过，不用重复提交！";
    }else{
        $isok = $subscribe->insert_email($email);
        if($isok ){
            echo "您已经订阅成功！";
        }else{
            echo "很抱歉，订阅失败！";
        }
    }
}
?>
