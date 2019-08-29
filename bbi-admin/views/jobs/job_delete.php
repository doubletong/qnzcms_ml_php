<?php
require_once('../../includes/common.php');
require_once('../../data/job.php');

$jobClass = new TZGCMS\Admin\Job();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $jobClass->delete_job($id);
}else{
    $result = array ('status'=>2,'message'=>'未传递Id');
    echo json_encode($result);  
}


