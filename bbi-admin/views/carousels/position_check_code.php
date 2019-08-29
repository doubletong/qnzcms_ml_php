<?php
require_once('../../includes/common.php');
require_once('../../data/position.php');

$positionClass = new TZGCMS\Admin\Position();

if(isset($_POST['id'],$_POST['code'])){
    $id=$_POST['id'];
    $code=$_POST['code'];
    echo $positionClass->check_code($id,$code);
    
}else{
    echo false;
}


