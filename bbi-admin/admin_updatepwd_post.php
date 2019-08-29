<?php
require_once('includes/common.php');
require_once('data/user.php');

$userClass = new User();

if (isset($_POST['userId'], $_POST['oldpassword'], $_POST['password'])) {
    $userId = $_POST['userId'];
  
    $oldpwd = md5($_POST['oldpassword']);
    $password = md5($_POST['password']);

    $data = $userClass->fetch_data($userId);
    
    if($oldpwd != $data['password']){
        echo 1;
        return;
    }

    $result = $userClass->update_pwd($userId, $password);
    if($result){
        echo 2;
        return;
    } 

}
echo 3;
return;

