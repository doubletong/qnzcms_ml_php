<?php
require_once('../../includes/common.php');
require_once('../../data/team.php');

$teamClass = new TZGCMS\Admin\Team();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $teamClass->delete_team($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


