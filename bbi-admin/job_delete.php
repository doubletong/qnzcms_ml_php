<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/job.php');

$jobClass = new Job();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $jobClass->delete_job($id);
}else{
    echo false;
}


