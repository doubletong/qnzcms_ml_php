<?php
require_once('../../includes/common.php');
require_once('../../data/major_category.php');


//按did获取分类
if( isset($_GET['did']) ){

    $did=$_GET['did'];
    $categoryClass = new TZGCMS\Admin\MajorCategory();
    $result = $categoryClass->fetch_all($did);
    
    echo json_encode($result);  
}