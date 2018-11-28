<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/distributor.php');

$distributorClass = new Distributor();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $distributorClass->delete_distributor($id);
}else{
    echo false;
}


