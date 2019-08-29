<?php
require_once('../../includes/common.php');
require_once('../../data/link.php');

$linkClass = new TZGCMS\Admin\Link();

if (isset( $_POST['title'], $_POST['importance'])) {
    $linkId = isset($_POST['linkId'])?$_POST['linkId']:0;
    $title = $_POST['title'];
    $importance = $_POST['importance'];
    $imageUrl = $_POST['imageUrl'];
    $link = $_POST['link'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $dictionary_id = $_POST['dictionary_id'];

    //   echo $content.$linkId;
    if(isset($_POST['linkId'])){
        echo $linkClass->update_link($linkId,
            $title, $importance, $imageUrl, $active,  $link, $dictionary_id);
    }else{
        echo $linkClass->insert_link($title, $importance, $imageUrl, $active, $link, $dictionary_id);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与排序不能为空！');
    echo json_encode($result);  
}

