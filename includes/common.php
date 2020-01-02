<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/data/option.php');

$siteOptionClass = new SiteOption();
$SiteOptionModel = $siteOptionClass->get_config("site_info");
$site_info  = json_decode($SiteOptionModel['config_values'], true);  //获取站点信息

date_default_timezone_set('Asia/Shanghai');   //设置时区

header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1"); //开启XSS保护



?>