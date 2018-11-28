<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/user.php');

$userClass = new User();

if (isset($_POST['username'], $_POST['password'])) {
    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //   echo $content.$productId;
    if(isset($_POST['userId'])){
        echo $userClass->update_user($userId, $username, $password);

    }else{
        echo $userClass->insert_user($username, $password);
    }

}else{
    echo false;
}

