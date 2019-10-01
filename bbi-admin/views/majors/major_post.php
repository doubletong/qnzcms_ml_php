<?php
require_once('../../includes/common.php');
require_once('../../data/major.php');

$majorClass = new TZGCMS\Admin\Major();

if (isset($_POST['title'], $_POST['image_url'])) {
    $majorId = $_POST['majorId'];
    $title = $_POST['title'];
    $category_id = isset($_POST['category_id']) ? $_POST['category_id']:0; 
    $dictionary_id = $_POST['dictionary_id'];
    $importance = $_POST['importance'];
    $image_url = isset($_POST['image_url']) ? $_POST['image_url']:"";   
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
 
    //   echo $content.$productId;
    if($majorId>0){
        echo $majorClass->update_major($majorId, $title, $category_id, $dictionary_id,  $image_url, $importance, $active,$recommend);

    }else{
        echo $majorClass->insert_major($title, $category_id, $dictionary_id,  $image_url, $importance, $active,$recommend);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

