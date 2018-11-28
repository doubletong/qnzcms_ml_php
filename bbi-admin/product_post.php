<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product.php');

$productClass = new Product();

if (isset( $_POST['product_no'],$_POST['title'], $_POST['importance'])) {
    $productId = $_POST['productId'];
    $product_no = $_POST['product_no'];
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $slogan = $_POST['slogan'];
    $price = $_POST['price'];
    $link = $_POST['link'];
    $importance = $_POST['importance'];
    $thumbnail = $_POST['thumbnail'];
    $background = $_POST['background'];
    $keywords = $_POST['keywords'];
    $recommend =isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $summary = $_POST['summary'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $company = $_POST['company'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);

 //   echo $content.$productId;
    if(isset($_POST['productId'])){
        echo $productClass->update_product($productId, $product_no,
            $title, $sub_title, $slogan,$price,$link, $importance, $thumbnail, $background, $keywords,$recommend, $active,$summary, $description, $content,$brand,$category,$company);

    }else{
        echo $productClass->insert_product($product_no,
            $title, $sub_title, $slogan,$price,$link, $importance, $thumbnail, $background, $keywords,$recommend, $active,$summary, $description, $content,$brand,$category,$company);

    }

}else{
    echo false;
}

