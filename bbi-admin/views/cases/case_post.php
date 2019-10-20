<?php
require_once('../../includes/common.php');
require_once('../../data/case.php');

$caseClass = new TZGCMS\Admin\CaseShow();

if (isset($_POST['title'], $_POST['body'])) {
    $caseId = $_POST['caseId'];
    $title = $_POST['title'];
    $categoryid = $_POST['categoryid'];
    $thumbnail = $_POST['thumbnail'];
    $body = stripslashes($_POST['body']);
    $summary = $_POST['summary'];
    $importance = $_POST['importance'];
    $pubdate = $_POST['pubdate'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
  
    //echo $productId;

    if($caseId>0){
        echo $caseClass->update_case($caseId, $title, $categoryid, $thumbnail,$body,$summary,$importance,$pubdate,$keywords,$description,$active,$recommend);

    }else{
        echo $caseClass->insert_case($title, $categoryid, $thumbnail,$body,$summary,$importance,$pubdate,$keywords,$description,$active,$recommend);

    }

}else{
    $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    echo json_encode($result);  
}

