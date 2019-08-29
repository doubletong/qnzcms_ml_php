<?php
require_once('../../includes/common.php');
require_once('../../data/team.php');

$teamClass = new TZGCMS\Admin\Team();

if (isset($_POST['name'], $_POST['post'])) {
    $teamId = $_POST['teamId'];
    $name = $_POST['name'];
    $post = $_POST['post'];
    $dictionary_id = $_POST['dictionary_id'];   
    $importance = $_POST['importance'];
    $photo = $_POST['photo'];
    $fullphoto = $_POST['fullphoto'];
    $content = stripslashes($_POST['content']);   
    

    //   echo $content.$productId;
    if($teamId>0){
        echo $teamClass->update_team($teamId, $name, $post, $photo,$fullphoto, $content, $dictionary_id,$importance);
    }else{
        echo $teamClass->insert_team($name, $post, $photo,$fullphoto, $content, $dictionary_id,$importance);
    }

}else{
    $result = array ('status'=>2,'message'=>'姓名和职位不能为空！');
    echo json_encode($result);  
}

