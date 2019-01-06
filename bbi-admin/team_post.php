<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/team.php');

$teamClass = new Team();

if (isset($_POST['name'], $_POST['content'])) {
    $teamId = $_POST['teamId'];
    $name = $_POST['name'];
    $post = $_POST['post'];
    $category = $_POST['category'];   
    $importance = $_POST['importance'];
    $photo = $_POST['photo'];
    $content = stripslashes($_POST['content']);   
    

    //   echo $content.$productId;
    if($teamId>0){
        echo $teamClass->update_team($teamId, $name, $post, $photo, $content, $category,$importance);

    }else{
        echo $teamClass->insert_team($name, $post, $photo, $content, $category,$importance);

    }

}else{
    echo false;
}

