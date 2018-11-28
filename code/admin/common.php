<?php
session_start();
if (!isset($_SESSION['valid_user'])){
	$url = SITEPATH."member/login.php";
	header("Location: $url");
	exit();
}?>