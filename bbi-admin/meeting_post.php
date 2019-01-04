<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/meeting.php');

$meetingClass = new Meeting();

if (isset($_POST['title'], $_POST['content'])) {
    $meetingId = $_POST['meetingId'];
    $title = $_POST['title'];
    $address = $_POST['address'];
    $thumbnail = $_POST['thumbnail'];
    $meeting_time = $_POST['meeting_time'];
    $sponsor = $_POST['sponsor'];
    $co_organizer = $_POST['co_organizer'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $content = stripslashes($_POST['content']);
    $summary = $_POST['summary'];
    
    $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    //   echo $content.$productId;
    if($meetingId>0){
        echo $meetingClass->update_meeting($meetingId, $title, $content, $summary, $meeting_time, $address, $sponsor, $co_organizer, $description, $keywords, $active,  $thumbnail);

    }else{
        echo $meetingClass->insert_meeting($title, $content, $summary, $meeting_time, $address, $sponsor, $co_organizer, $description, $keywords, $active,  $thumbnail);

    }

}else{
    echo false;
}

