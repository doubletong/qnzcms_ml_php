<?php
require_once('../../includes/common.php');
require_once('../../data/position.php');

$positionClass = new TZGCMS\Admin\Position();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $positionClass->delete_position($id);
}else{
    echo false;
}


