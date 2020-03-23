<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Utils/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Models\Menu;

$commonClass = new QNZ\Utils\Common();

CacheManager::setDefaultConfig(new ConfigurationOption([
    'path' => $_SERVER['DOCUMENT_ROOT'].'/assets/caches/tmp', // 缓存路径 or in windows "C:/tmp/"
]));



$uri = $_SERVER['REQUEST_URI'];


//缓存设置
if($site_info['enableCaching']=="1"){
    // In your class, function, you can call the Cache
    $InstanceCache = CacheManager::getInstance('files');

    $keyMainav = "mainav";  //主导航
    $Cached_mainav = $InstanceCache->getItem($keyMainav);
  
    if (!$Cached_mainav->isHit()) {   
    
        $menus = Menu::where('active',1)->where('group_id',1)->orderBy('importance', 'DESC')->get();
        $menutree = $commonClass->buildMenuTree($menus->toArray(),0);


        $currentMenu =  $menus->where('url',$uri)->first();
        $breadcrumb = $commonClass->breadcrumb($menus->toArray(),$currentMenu->id);

        $menutree =  ['mainav' => $menutree,'breadcrumb'=>$breadcrumb];

        $Cached_mainav->set($menutree)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($Cached_mainav);    // Save the cache item just like you do with doctrine and entities       

    } 
    $keyBotnav = "botnav"; //页脚导航
    $Cached_botnav = $InstanceCache->getItem($keyBotnav);
    if (!$Cached_botnav->isHit()) {

        $menus_bot = Menu::with('children')->where('active',2)->where('group_id',1)->orderBy('importance', 'DESC')->get();

        $Cached_botnav->set($menus_bot)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($Cached_botnav);    // Save the cache item just like you do with doctrine and entities       

    } 

    $menutree = $Cached_mainav->get();
    $menus_bot = $Cached_botnav->get();

}else{
     
    $menus = Menu::where('active',1)->where('group_id',1)->orderBy('importance', 'DESC')->get();
    $menutree = $commonClass->buildMenuTree($menus->toArray(),0);
   
    $currentMenu =  $menus->where('url',$uri)->first();
    $breadcrumb = $commonClass->breadcrumb($menus->toArray(),$currentMenu->id);

    $menutree =  ['mainav' => $menutree,'breadcrumb'=>$breadcrumb];

    $menus_bot = Menu::with('children')->where('active',1)->where('group_id',2)->orderBy('importance', 'DESC')->get();
}


?>