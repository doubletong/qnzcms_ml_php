<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;

CacheManager::setDefaultConfig(new ConfigurationOption([
    'path' => $_SERVER['DOCUMENT_ROOT'].'/assets/caches/tmp', // 缓存路径 or in windows "C:/tmp/"
]));

//获取公用数据
require_once($_SERVER['DOCUMENT_ROOT'] . "/data/menu.php");

$menuClass = new Menu();

$uri = $_SERVER['REQUEST_URI'];


//构建树形导航
function buildMenuTree(array $elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildMenuTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}

//缓存设置
if($site_info['enableCaching']=="1"){
    // In your class, function, you can call the Cache
    $InstanceCache = CacheManager::getInstance('files');

    $keyMainav = "mainav";  //主导航
    $Cached_mainav = $InstanceCache->getItem($keyMainav);
  
    if (!$Cached_mainav->isHit()) {
   
        $menus = $menuClass->get_all_menu(32);     
        $menutree = buildMenuTree($menus);

        $Cached_mainav->set($menutree)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($Cached_mainav);    // Save the cache item just like you do with doctrine and entities       

    } 
    $keyBotnav = "botnav"; //页脚导航
    $Cached_botnav = $InstanceCache->getItem($keyBotnav);
    if (!$Cached_botnav->isHit()) {

        $menus_bot = $menuClass->get_all_menu(40);

        $Cached_botnav->set($menus_bot)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($Cached_botnav);    // Save the cache item just like you do with doctrine and entities       

    } 

    $menutree = $Cached_mainav->get();
    $menus_bot = $Cached_botnav->get();

}else{
    $menus = $menuClass->get_all_menu(32);     
    $menutree = buildMenuTree($menus);

    $menus_bot = $menuClass->get_all_menu(40);
}


?>