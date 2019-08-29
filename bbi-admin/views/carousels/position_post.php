<?php
require_once('../../includes/common.php');
require_once('../../data/position.php');

$positionClass = new TZGCMS\Admin\Position();

if (isset( $_POST['title'], $_POST['importance'])) {
    $positionId = $_POST['positionId'];
    $title = $_POST['title'];
    $code = $_POST['code'];
    $importance = $_POST['importance'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    //   echo $content.$positionId;
    if($_POST['positionId']>0){
        echo $positionClass->update_position($positionId, $title,$code, $importance,  $active);
    }else{
        echo $positionClass->insert_position($title,$code, $importance, $active);
    }

}else{
    echo false;
}

