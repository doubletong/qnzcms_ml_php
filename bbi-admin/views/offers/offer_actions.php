<?php
require_once('../../includes/common.php');
require_once('../../data/offer.php');

$offerClass = new TZGCMS\Admin\OfferRepository();

//   echo $content.$productId;
if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $offerClass->delete_offer($id);    
            break;   
        case "active":
            echo $offerClass->active_offer($id);  
            break;
        case "recommend":
            echo $offerClass->recommend_offer($id);  
            break;
        case "copy":
            echo $offerClass->copy_offer($id);  
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}

