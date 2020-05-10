<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/utils/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Models\Menu;
use Models\SocialAccount;

$commonClass = new QNZ\Utils\Common();

CacheManager::setDefaultConfig(new ConfigurationOption([
    'path' => $_SERVER['DOCUMENT_ROOT'].'/assets/caches/tmp',    // 缓存路径 or in windows "C:/tmp/"
]));



$uri = $_SERVER['REQUEST_URI'];


//缓存设置
if($site_info['enableCaching']=="1"){
    // In your class, function, you can call the Cache
    $InstanceCache = CacheManager::getInstance('files');

    

    $keyCommonData = "common_data";  //主导航
    $Cached_common_data = $InstanceCache->getItem($keyCommonData);
  
    if (!$Cached_common_data->isHit()) {   
    
        $result = loadCommonDate($commonClass,$uri); 

        $Cached_common_data->set($result)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($Cached_common_data);    // Save the cache item just like you do with doctrine and entities       

    } 

    $commonData = $Cached_common_data->get();

}else{
     
    
    $commonData = loadCommonDate($commonClass,$uri);
}

function loadCommonDate($commonClass,$uri){
    $menus = Menu::with(array('children' => function ($query) {
        $query->orderBy('importance', 'DESC')->get();
    }))->where('active',1)->where('group_id',1)->where('parent',0)->orderBy('importance', 'DESC')->get();
    // $menutree = $commonClass->buildMenuTree($menus->toArray(),0);
   
    $currentMenu =  $menus->where('url',$uri)->first();
    $breadcrumb =  isset($currentMenu) ? $commonClass->breadcrumb($menus->toArray(),$currentMenu->id) : null;

    $menus_bot = Menu::with(array('children' => function ($query) {
        $query->orderBy('importance', 'DESC')->get();
    }))->where('active',1)->where('group_id',2)->where('parent',0)->orderBy('importance', 'DESC')->get();

    $socials = SocialAccount::with(['socialSoftware' => function ($query) {
        $query->select('id', 'iconfont');
    }])->select('id','username', 'qrcode', 'url', 'social_id')->where('active',1)->orderBy('importance', 'DESC')->get();
    

    return  ['mainav' => $menus,'breadcrumb'=>$breadcrumb,'menus_bot'=>$menus_bot,'socials'=>$socials];
}



?>