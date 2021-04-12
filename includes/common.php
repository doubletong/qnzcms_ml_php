<?php

define("ADMINPATH","{$_SERVER['DOCUMENT_ROOT']}/bbi_admin/");

$config = include dirname(__FILE__).'/settings.php';
// require_once(dirname(__FILE__). '/../config/db.php');
require_once(dirname(__FILE__). '/../config/database.php');

use Models\Option;

$site_info = null;

$lang = $_GET['lang']??'zh-cn';
//$lang = isset($_GET['lang']) && !empty($_GET['lang']) ? $_GET['lang']:'zh-CN';
$configkey = 'site_info_'.$lang;

$site_option = Option::find($configkey);
$site_sys_option = Option::find('sys');


if(isset($site_option )){
	$site_sys = isset($site_sys_option )?json_decode($site_sys_option->config_values,true):null;
	$site_info  =  json_decode($site_option->config_values,true);  //获取站点信息
	// 合并系统信息跟基本信息
	if(isset($site_sys)){
		$site_info = array_merge($site_sys, $site_info);
	}
	
	// var_dump($site_info);
}


date_default_timezone_set('Asia/Shanghai');   //设置时区

// header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1"); //开启XSS保护


$langUrl =  $_SERVER['DOCUMENT_ROOT'] .'/resources/site_'.$lang.'.php';

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