<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/chronicle.php');

$chronicleClass = new Chronicle();

if (isset( $_POST['year'], $_POST['description'])) {
    $chronicleId = $_POST['chronicleId'];
    $year = $_POST['year'];
    $image_url = isset($_POST['image_url']) ? $_POST['image_url']:"";
    $description = stripslashes($_POST['description']);
    $dictionary_id = $_POST['dictionary_id'];
    //   echo $content.$chronicleId;
    if(isset($_POST['chronicleId'])){
        echo $chronicleClass->update_chronicle($chronicleId,
            $year,$image_url, $description,$dictionary_id);
    }else{
        echo $chronicleClass->insert_chronicle($year, $image_url, $description,$dictionary_id);
    }

}else{
    echo false;
}

