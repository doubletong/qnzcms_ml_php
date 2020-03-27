<?php

$config = include $_SERVER['DOCUMENT_ROOT'].'/includes/settings.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/common.php');

$GLOBALS['Lang'] = include $_SERVER['DOCUMENT_ROOT'] .'/resources/admin.php';

//print_r($GLOBALS['Lang']);
 // 多语言函数
 function lang($string)
 {
	 if(isset($GLOBALS['Lang'][$string]))
	 {
		 return $GLOBALS['Lang'][$string];
	 }
	 else
	 {
		 // 语言配置不存在原样输出
		 return $string;
	 }
 }


use Models\Metadata;

session_start();

if (!isset($_SESSION['valid_user'])){
	$url = "/bbi-admin/login.php";
	header("Location: $url");
	exit();
}


// SEO set

function metadataSave($title,$keywords,$description,$module_type,$key_value){
	$metadata = Metadata::where('module_type',$module_type)->where('key_value',$key_value)->first();

	if(isset($metadata)){
		$metadata->title = $title;
		$metadata->keywords = $keywords;
		$metadata->description = $description;
		$metadata->save();                
	}else{
		$mditem = new Metadata();
		$mditem->module_type = $module_type;
		$mditem->key_value = $key_value;
		$mditem->title = $title;
		$mditem->keywords = $keywords;
		$mditem->description = $description;
		$mditem->save();
	}
}


?>