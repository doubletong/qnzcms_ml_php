<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/page.php');

$pageClass = new Page();

if(isset($_POST['id'])){
    $id=$_POST['id'];
    echo $pageClass->delete_page($id);
}else{
    echo false;
}


