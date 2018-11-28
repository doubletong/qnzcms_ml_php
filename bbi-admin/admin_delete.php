<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/user.php');

$userClass = new User();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $userClass->delete_user($id);
}else{
    echo false;
}


