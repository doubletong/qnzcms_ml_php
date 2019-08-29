<?php
require_once('../../includes/common.php');
require_once('../../data/job.php');

$jobClass = new TZGCMS\Admin\Job();

if (isset( $_POST['title'], $_POST['address'])) {
    $jobId = $_POST['jobId'];
    $title = $_POST['title'];
    $department = isset($_POST['department'])?$_POST['department']:"";
    $address = $_POST['address'];
    $population = $_POST['population'];
    $content = stripslashes($_POST['content']);
    $importance = $_POST['importance'];

    if($_POST['jobId']>0){
        echo $jobClass->update_job($jobId,$title, $department, $address, $population, $content,$importance);
    }else{
        echo $jobClass->insert_job($title, $department, $address, $population, $content,$importance);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与排序不能为空！');
    echo json_encode($result);  
}

