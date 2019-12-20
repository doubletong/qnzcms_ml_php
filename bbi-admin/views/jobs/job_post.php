<?php
require_once('../../includes/common.php');
require_once('../../data/job.php');

$jobClass = new TZGCMS\Admin\Job();

if (isset( $_POST['title'], $_POST['department'])) {
    $jobId = $_POST['jobId'];
    $title = $_POST['title'];
    $department = isset($_POST['department'])?$_POST['department']:"";
    $address =  isset($_POST['address'])?$_POST['address']:""; 
    $population = $_POST['population'];
    $content = stripslashes($_POST['content']);
    $importance = $_POST['importance'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    if($_POST['jobId']>0){
        echo $jobClass->update_job($jobId,$title, $department, $address, $population, $content,$importance, $active);
    }else{
        echo $jobClass->insert_job($title, $department, $address, $population, $content,$importance, $active);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与类型不能为空！');
    echo json_encode($result);  
}

