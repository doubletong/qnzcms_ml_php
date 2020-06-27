<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

// use Phpfastcache\CacheManager;
// use Phpfastcache\Config\ConfigurationOption;
use Models\AdvertisingSpace;
use Models\Metadata;
use Models\News;
use Models\NewsCategory;



$metaKey = "/";



//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => 'assets/caches',
    ]);
    // In your class, function, you can call the Cache
    //$InstanceCache = CacheManager::getInstance('files');

    $key = "home";
    $CachedString = $InstanceCache->getItem($key);

   

    if (!$CachedString->isHit()) {       

        $home_data = loadDate($metaKey);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities

 
        //echo $CachedString->get();

    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  
    $result = loadDate($metaKey);
}


//load data
function loadDate($metaKey){

    $space = AdvertisingSpace::with(array('advertisements' => function ($query) {
        $query->where('active',1)->orderBy('importance', 'DESC')->get();
    }))->where('code','=','A001')->first();

    $carousels = !empty($space)?$space->advertisements:null;

    $ids = NewsCategory::where('parent','=',1)->select('id')->get();    
  
    $articles = News::where('active',1)->where('recommend',1)->whereIn('category_id',$ids)->orderBy('pubdate', 'DESC')->take(6)->get();

    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metaKey)->first();       

    return  ['carousels' => $carousels, 'metadata'=>$metadata,'articles'=>$articles];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);


echo $twig->render('index.html', $result);

?>