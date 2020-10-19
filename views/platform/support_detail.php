<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\News;
use Models\Metadata;
use Models\Advertisement;

$lang = isset($_GET['lang'])?$_GET['lang']:'zh-CN';  

if (!isset($_GET['id'])) {   
    header("HTTP/1.0 404 Not Found");
    exit;
} 

$id = $_GET['id'];


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = $lang.'_platform_support_'.$id;    
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {
      
        $home_data = loadDate($commonData['mainav']);

        $CachedString->set($home_data)->expiresAfter(5000);  //in seconds, also accepts Datetime
        $InstanceCache->save($CachedString);   // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($commonData['mainav']);
    //echo $metadata;
}


//load data
function loadDate($menus){

    $id = $_GET['id'];
    $article = News::find($id);
    if(isset($article)){
        $article->view_count=$article->view_count + 1;
        $article->save();
    }

    $lang = isset($_GET['lang'])?$_GET['lang']:'zh-CN';  
    if($lang=='zh-CN'){
        $subnavs = $menus->where('url','/platform')->first()->children;      
    }else{
        $subnavs = $menus->where('url', '/'.$lang.'/platform')->first()->children;        
    }
 

    $code = $lang == 'zh-CN'?'A006': 'A006_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();

    $metadata = Metadata::where('module_type',ModuleType::NEWS())->where('key_value',$id)->first();

    return  ['article' => $article,'subnavs' => $subnavs, 'metadata'=>$metadata, 'carousel'=>$carousel];
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

echo $twig->render('platform/support_detail.html', $result);

?>