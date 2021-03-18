<?php

define("ADMINPATH","{$_SERVER['DOCUMENT_ROOT']}/bbi_admin/");

$config = include dirname(__FILE__).'/settings.php';
require_once(dirname(__FILE__). '/../config/db.php');
require_once(dirname(__FILE__). '/../config/database.php');

use Models\Option;

$site_info = null;

$lang = isset($_GET['lang']) && !empty($_GET['lang']) ? $_GET['lang']:'zh-CN';
$configkey = $lang=='zh-CN'? 'site_info' : 'site_info_'.$lang;

$siteOption = Option::find($configkey);
if(isset($siteOption )){
	$site_info  =  json_decode($siteOption->config_values,true);  //获取站点信息
}


date_default_timezone_set('Asia/Shanghai');   //设置时区

header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1"); //开启XSS保护


$langUrl = $lang=='zh-CN' ? $_SERVER['DOCUMENT_ROOT'] .'/resources/site.php' : $_SERVER['DOCUMENT_ROOT'] .'/resources/site_'.$lang.'.php';

$GLOBALS['siteLang'] = include $langUrl;

//print_r($GLOBALS['Lang']);
 // 多语言函数
 function sitelang($string)
 {
	 if(isset($GLOBALS['siteLang'][$string]))
	 {
		 return $GLOBALS['siteLang'][$string];
	 }
	 else
	 {
		 // 语言配置不存在原样输出
		 return $string;
	 }
 }



?>