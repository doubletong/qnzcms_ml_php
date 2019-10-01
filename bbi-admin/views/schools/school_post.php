<?php
require_once('../../includes/common.php');
require_once('../../data/school.php');

$schoolClass = new TZGCMS\Admin\School();

if (isset($_POST['title'], $_POST['image_url'])) {
    $schoolId = $_POST['schoolId'];
    $title = $_POST['title'];
    $country_id = isset($_POST['country_id']) ? $_POST['country_id']:0; 
    $dictionary_id = $_POST['dictionary_id'];
    $importance = $_POST['importance'];
    $image_url = isset($_POST['image_url']) ? $_POST['image_url']:"";   
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
 
    //   echo $content.$productId;
    if($schoolId>0){
        echo $schoolClass->update_school($schoolId, $title, $country_id, $dictionary_id,  $image_url, $importance, $active,$recommend);

    }else{
        echo $schoolClass->insert_school($title, $country_id, $dictionary_id,  $image_url, $importance, $active,$recommend);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

