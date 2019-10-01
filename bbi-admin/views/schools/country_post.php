<?php
require_once('../../includes/common.php');
require_once('../../data/country.php');

$caseClass = new TZGCMS\Admin\Country();

if (isset($_POST['name'])) {

    $categoryId = $_POST['categoryId'];
    $name = $_POST['name'];   
    $importance = $_POST['importance'];
    $active = $_POST['active'];    
 
    if($categoryId>0){
        echo  $caseClass->update_category($categoryId, $name, $importance,$active);

    }else{
        echo $caseClass->insert_category($name, $importance,$active);
    }

}else{
    $result = array ('status'=>2,'message'=>'名称不能为空！');
    echo json_encode($result);  
}

