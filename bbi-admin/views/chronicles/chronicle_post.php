<?php
require_once('../../includes/common.php');
require_once('../../data/chronicle.php');

$chronicleClass = new TZGCMS\Admin\Chronicle();

if (isset( $_POST['year'], $_POST['description'])) {
    $chronicleId = $_POST['chronicleId'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $image_url = isset($_POST['image_url']) ? $_POST['image_url']:"";
    $description = stripslashes($_POST['description']);
    $dictionary_id = $_POST['dictionary_id'];
    
    // echo $content.$chronicleId;
    if($_POST['chronicleId']>0){
        echo $chronicleClass->update_chronicle($chronicleId, $year,$month, $image_url, $description,$dictionary_id);
    }else{
        echo $chronicleClass->insert_chronicle($year,$month, $image_url, $description, $dictionary_id);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

