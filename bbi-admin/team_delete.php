<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/team.php');

$teamClass = new Team();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $teamClass->delete_team($id);
}else{
    echo false;
}


