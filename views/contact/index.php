<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;
use Models\Metadata;
use Models\Advertisement;
use Models\Link;

$alias = 'contact';  // $_GET['alias'];

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = $lang."_contact";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($lang,$alias);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($lang,$alias);

    //echo $metadata;
}

//load data
function loadDate($lang,$alias){

    
    $data = Page::where('alias',$alias)->where('lang',$lang)->where('active',1)->first();
    if(isset($data)){
        $data->view_count = $data->view_count + 1;
        $data->save();
    }

    $code = $lang == 'zh-CN'?'A012': 'A012_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
    ->where('advertisements.active',1)
    ->where('advertising_spaces.code','=',$code)->first();
    
    $metakey = $alias."_".$lang;
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();     

    $links = Link::where("active",1)->where("category_id",2)->where('lang',$lang)->orderBy('importance', 'DESC')->get();

    return  ['page' => $data, 'metadata'=>$metadata,'carousel'=>$carousel,'friendlyLinks'=>$links];
}

$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);
$twig->addGlobal('lang', $lang);
$twig->addGlobal('resources', $GLOBALS['siteLang']);
$twig->addGlobal('links', $commonData['links']);

echo $twig->render('contact/index.html', $result);

?>