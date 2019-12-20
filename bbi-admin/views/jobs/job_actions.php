<?php
require_once('../../includes/common.php');
require_once('../../data/job.php');

$jobClass = new TZGCMS\Admin\Job();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $jobClass->delete_job($id);    
            break;   
        case "active":
            echo $jobClass->active_job($id);  
            break;
        // case "recommend":
        //     echo $jobClass->recommend_job($id);  
        //     break;
        case "copy":
            echo $jobClass->copy_job($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
