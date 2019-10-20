<?php
require_once('../../includes/common.php');
require_once('../../data/product.php');

$productClass = new TZGCMS\Admin\Product();

if (isset($_POST['category_id'], $_POST['title'], $_POST['importance'])) {

    $productId = isset($_POST['productId']) ? $_POST['productId']:0;
    $title = $_POST['title'];
    $importance = $_POST['importance'];
    $thumbnail = $_POST['thumbnail'];
    $image_url = $_POST['image_url'];
    $keywords = $_POST['keywords'];
    $recommend =isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $summary = $_POST['summary']; 
    $category_id = $_POST['category_id'];       
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $specifications = stripslashes($_POST['specifications']);
    $registration = isset($_POST['registration']) ? stripslashes($_POST['registration']):"";
    $dictionary_id = $_POST['dictionary_id'];

 //   echo $content.$productId;
    if(isset($_POST['productId'])){
        echo $productClass->update_product($productId, $title,  $importance, $thumbnail, $image_url, $keywords,$recommend, $active,$summary, 
            $description, $content, $specifications,$registration, $category_id,$dictionary_id); 

    }else{
        echo $productClass->insert_product($title,  $importance, $thumbnail, $image_url, $keywords,$recommend, $active,$summary, 
        $description, $content, $specifications,$registration,$category_id,$dictionary_id);
    }

}else{

    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}
