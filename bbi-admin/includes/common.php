<?php

$config = include $_SERVER['DOCUMENT_ROOT'].'/includes/settings.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/common.php');

session_start();

if (!isset($_SESSION['valid_user'])){
	$url = "/bbi-admin/login.php";
	header("Location: $url");
	exit();
}



