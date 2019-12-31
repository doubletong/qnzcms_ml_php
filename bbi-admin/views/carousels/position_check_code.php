<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');
use Models\AdvertisingSpace;

if(isset($_POST['id'],$_POST['code'])){
    $id=$_POST['id'];
    $code=$_POST['code'];
    echo AdvertisingSpace::where('code', $code)
    ->where('id','<>', $id)
    ->count();
    
}else{
    echo 0;
}


