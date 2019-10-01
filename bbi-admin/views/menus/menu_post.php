<?php
require_once('../../includes/common.php');
require_once('../../data/menu.php');

$caseClass = new TZGCMS\Admin\Menu();

if (isset($_POST['title'], $_POST['dictionary_id'])) {
    $menu_id = $_POST['menu_id'];
    $title = $_POST['title'];
    $description = isset($_POST['description']) ? $_POST['description']:"";
    $url = $_POST['url'];  
    $dictionary_id =  $_POST['dictionary_id'];
    $parent_id = isset($_POST['parent_id']) ?$_POST['parent_id']:0;
    $importance = $_POST['importance'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
  

    //   echo $content.$productId;
    if($menu_id>0){
        echo  $caseClass->update_menu($menu_id, $title, $description, $url,$parent_id, $dictionary_id, $importance,$active);

    }else{
        echo $caseClass->insert_menu($title, $description, $url,$parent_id, $dictionary_id, $importance,$active);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与排序不能为空！');
    echo json_encode($result);  
}

