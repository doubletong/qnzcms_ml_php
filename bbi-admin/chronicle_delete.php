<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/chronicle.php');

$chronicleClass = new Chronicle();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $chronicleClass->delete_chronicle($id);
}else{
    echo false;
}


