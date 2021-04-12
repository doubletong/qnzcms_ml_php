<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;
use Models\News;
use Models\Metadata;
use Models\Advertisement;



//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = $lang.'_DEVELOPMENT';
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($commonData['mainav'],$lang);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($commonData['mainav'],$lang);

    //echo $metadata;
}

//load data
function loadDate($menus,$lang){
    $alias = 'development';  
    $data = Page::where('alias',$alias)->where('lang',$lang)->where('active',1)->first();
    if(isset($data)){
        $data->view_count = $data->view_count + 1;
        $data->save();
    }

    $curent_url = "/{$lang}/{$alias}";
    $current_menu = $menus->where('url',$curent_url)->first();
    $subnavs = $current_menu->children;

    // $articles = News::where('category_id',6)->where('lang',$lang)->where('active',1)
    //     ->orderBy('importance','DESC')->orderBy('id','DESC')->get();

    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
    ->where('advertisements.lang', $lang)->where('advertisements.active',1)
    ->where('advertising_spaces.code','=','A006')->first();

    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$curent_url)->first();

    return  ['page'=>$data,'subnavs'=>$subnavs, 'current_menu'=>$current_menu, 'metadata'=>$metadata,'carousel'=>$carousel];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
// $twig->addGlobal('navbot', $commonData['menus_bot']);
// $twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);
$twig->addGlobal('lang', $lang);
$twig->addGlobal('resources', $GLOBALS['siteLang']);
// $twig->addGlobal('links', $commonData['links']);

echo $twig->render('career/index.twig', $result);

?>