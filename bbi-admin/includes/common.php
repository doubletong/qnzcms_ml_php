<?php

$config = include $_SERVER['DOCUMENT_ROOT'].'/includes/settings.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/data/option.php');

$siteOptionClass = new SiteOption();
$SiteOptionModel = $siteOptionClass->get_config("site_info");
$site_info  = json_decode($SiteOptionModel['config_values'], true);


session_start();

if (!isset($_SESSION['valid_user'])){
	$url = "/bbi-admin/login.php";
	header("Location: $url");
	exit();
}


