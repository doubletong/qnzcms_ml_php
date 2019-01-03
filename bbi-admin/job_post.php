<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/Job.php');

$jobClass = new Job();

if (isset( $_POST['title'], $_POST['address'])) {
    $jobId = $_POST['jobId'];
    $title = $_POST['title'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $population = $_POST['population'];
    $content = stripslashes($_POST['content']);


    if(isset($_POST['jobId'])){
        echo $jobClass->update_job($jobId,$title, $department, $address, $population, $content);
    }else{
        echo $jobClass->insert_job($title, $department, $address, $population, $content);
    }

}else{
    echo false;
}

