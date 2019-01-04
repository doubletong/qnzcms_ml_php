<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/meeting.php');

$meetingClass = new Meeting();

//   echo $content.$productId;
if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $meetingClass->delete_meeting($id);
}else{
    echo false;
}


