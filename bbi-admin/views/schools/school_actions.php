<?php
require_once('../../includes/common.php');
require_once('../../data/school.php');

$schoolClass = new TZGCMS\Admin\School();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $schoolClass->delete_school($id);    
            break;   
        case "active":
            echo $schoolClass->active_school($id);  
            break;
        case "recommend":
            echo $schoolClass->recommend_school($id);  
            break;
        case "copy":
            echo $schoolClass->copy_school($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}

//按did获取分类
// if( isset($_GET['did']) ){

//     $did=$_GET['did'];
//     $categoryClass = new TZGCMS\Admin\SchoolCategory();
//     $result = $categoryClass->fetch_all($did);
    
//     echo json_encode($result);  
// }