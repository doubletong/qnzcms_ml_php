<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/case.php');

$caseClass = new CaseShow();

if (isset($_POST['title'], $_POST['categoryid'])) {
    $caseId = $_POST['caseId'];
    $title = $_POST['title'];
    $categoryid = $_POST['categoryid'];
    $thumbnail = $_POST['thumbnail'];
    $body = stripslashes($_POST['body']);
    $summary = $_POST['summary'];
    $importance = $_POST['importance'];
    $pubdate = $_POST['pubdate'];

    $recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
    //   echo $content.$productId;
    if($caseId>0){
        echo $caseClass->update_case($caseId, $title, $categoryid, $thumbnail,$body,$summary,$importance,$pubdate,$recommend);

    }else{
        echo $caseClass->insert_case($title, $categoryid, $thumbnail,$body,$summary,$importance,$pubdate,$recommend);

    }

}else{
    echo false;
}

