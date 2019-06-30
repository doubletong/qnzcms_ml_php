<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/menu.php');

$menuClass = new Menu();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $menuClass->delete_menu($id);
}else{
    echo false;
}


