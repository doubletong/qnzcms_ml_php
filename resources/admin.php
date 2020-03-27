<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/common.php');


use Models\Resource;

$utilsCommon = new QNZ\Utils\Common;

$langs = Resource::select('key','value')->where('lang_code','zh-CN')->get();
$result = null;
foreach($langs as $lang){
    $result[$lang->key] = $lang->value;   
}
return  $result ; //$utilsCommon->aryy_x($langs);


// array(
//     'General Information'  =>   '基本信息',
//     'System Environments'  =>   '系统环境',
//     'System Information'  =>   '系统信息',
// );