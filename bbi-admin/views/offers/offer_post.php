<?php
require_once('../../includes/common.php');
require_once('../../data/offer.php');

$offerClass = new TZGCMS\Admin\OfferRepository();

if (isset($_POST['name'], $_POST['image_url'])) {
    $offerId = $_POST['offerId'];
    $name = $_POST['name'];
    $schools = isset($_POST['schools']) ? $_POST['schools']:""; 
    $scholarship = isset($_POST['scholarship']) ? $_POST['scholarship']:"";    
    $dictionary_id = $_POST['dictionary_id'];
    $importance = $_POST['importance'];
    $image_url = isset($_POST['image_url']) ? $_POST['image_url']:"";   
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
 
    //   echo $content.$productId;
    if($offerId>0){
        echo $offerClass->update_offer($offerId, $name, $schools, $scholarship, $dictionary_id,  $image_url, $importance, $active,$recommend);

    }else{
        echo $offerClass->insert_offer($name, $schools, $scholarship, $dictionary_id,  $image_url, $importance, $active,$recommend);
    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

