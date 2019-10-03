<?php
require_once('../../includes/common.php');
require_once('../../data/link.php');

$linkClass = new TZGCMS\Admin\LinkRepository();

if (isset( $_POST['title'], $_POST['importance'])) {
    $linkId = isset($_POST['linkId'])?$_POST['linkId']:0;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $importance = $_POST['importance'];
    $image_url = $_POST['image_url'];
    $url = $_POST['url'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
    $dictionary_id = $_POST['dictionary_id'];

    //   echo $content.$linkId;
    if($_POST['linkId']>0){
        echo $linkClass->update_link($linkId, $title,$description, $importance, $image_url, $active,$recommend,  $url, $dictionary_id);
    }else{
        echo $linkClass->insert_link($title,$description, $importance, $image_url, $active,$recommend, $url, $dictionary_id);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与排序不能为空！');
    echo json_encode($result);  
}

