<?php
require_once('../../includes/common.php');
require_once('../../data/annal.php');

$annalClass = new TZGCMS\Admin\Annal();

if (isset( $_POST['year'], $_POST['description'])) {
    $annalId = $_POST['annalId'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $image_url = isset($_POST['image_url']) ? $_POST['image_url']:"";
    $description = stripslashes($_POST['description']);
    $dictionary_id = $_POST['dictionary_id'];
    
    // echo $content.$annalId;
    if($_POST['annalId']>0){
        echo $annalClass->update_annal($annalId, $year,$month, $image_url, $description,$dictionary_id);
    }else{
        echo $annalClass->insert_annal($year,$month, $image_url, $description, $dictionary_id);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

