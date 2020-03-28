<?php
define("ADMINPATH","{$_SERVER['DOCUMENT_ROOT']}/bbi_admin/");

$config = include $_SERVER['DOCUMENT_ROOT'].'/includes/settings.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');

use Models\Option;

$siteOption = Option::find("site_info");
$site_info  =  json_decode($siteOption->config_values,true);  //获取站点信息

date_default_timezone_set('Asia/Shanghai');   //设置时区

header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1"); //开启XSS保护


?>