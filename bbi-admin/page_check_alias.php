<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/page.php');

$pageClass = new Page();

if(isset($_POST['id'],$_POST['alias'])){
    $id=$_POST['id'];
    $alias=$_POST['alias'];
    echo $pageClass->check_alias($id,$alias);
    
}else{
    echo false;
}


