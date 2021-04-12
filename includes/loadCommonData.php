<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/utils/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Models\Menu;
use Models\Link;
use Models\Language;


$commonClass = new QNZ\Utils\Common();

CacheManager::setDefaultConfig(new ConfigurationOption([
    'path' => $_SERVER['DOCUMENT_ROOT'].'/caches/tmp',    // 缓存路径 or in windows "C:/tmp/"
]));



$uri = $_SERVER['REQUEST_URI'];


//缓存设置
if($site_info['enableCaching']=="1"){
    // In your class, function, you can call the Cache
    $InstanceCache = CacheManager::getInstance('files');    

    $keyCommonData = "COMMON_DATA_$lang";  //主导航
    $Cached_common_data = $InstanceCache->getItem($keyCommonData);
  
    if (!$Cached_common_data->isHit()) {   
    
        $result = loadCommonDate($commonClass,$uri,$lang); 

        $Cached_common_data->set($result)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($Cached_common_data);    // Save the cache item just like you do with doctrine and entities       

    } 

    $commonData = $Cached_common_data->get();

}else{     
    
    $commonData = loadCommonDate($commonClass,$uri,$lang);
}

function loadCommonDate($commonClass,$uri,$lang){

    $navs = Menu::with(array('children' => function ($query) {
        $query->orderBy('importance', 'DESC')->get();
    }))->where('active',1)->where('parent',0)->where('lang',$lang)->orderBy('importance', 'DESC')->get();

    $menus = $navs->where('group_id',1);  
    
    $langs = Language::where('active',1)->orderby('importance','DESC')->get();

    $hasUrl = Menu::where('url','like', $uri)->count()>0;
    $langList = array();
    foreach($langs as $item){
        $lang_code = strtolower($item->code);
        $langLabel = array();
        if($hasUrl){
            $langLabel['url'] = str_replace('/'.$lang.'/', '/'.$lang_code.'/', $uri);
            $langLabel['name'] = $item->show_label;
            $langLabel['active'] = $lang==$lang_code;
        }else{
            $langLabel['url'] = '/'.$lang_code.'/';
            $langLabel['name'] = $item->show_label;
            $langLabel['active'] = $lang==$lang_code;
        }    
        array_push($langList , $langLabel);
    }


    // print_r($langList);
    // $currentMenu =  $menus->where('url',$uri)->first();
    // $breadcrumb =  isset($currentMenu) ? $commonClass->breadcrumb($menus->toArray(),$currentMenu->id) : null;

    // $menus_bot = $navs->where('group_id',2);
    // $menus_top = $navs->where('group_id',3);

    // $socials = SocialAccount::with(['socialSoftware' => function ($query) {
    //     $query->select('id', 'iconfont');
    // }])->select('id','username', 'qrcode', 'url', 'social_id')->where('active',1)->orderBy('importance', 'DESC')->get();

    $footer_links = Link::select('id','url', 'title', 'font_icon', 'link_type')
            ->where('category_id',1)->where('active',1)
            ->where('lang',$lang)
            ->orderBy('importance', 'DESC')->get();
    

    return  ['mainav' => $menus, 'langList'=>$langList, 'breadcrumb'=>null, 'footer_links'=>$footer_links];
}


?>