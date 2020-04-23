<?php
require_once(__DIR__ . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");


use Models\AdvertisingSpace;
use Models\ServiceItem;



//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => 'assets/caches',
    ]);
    // In your class, function, you can call the Cache
    $InstanceCache = CacheManager::getInstance('files');

    $key = "home";
    $CachedString = $InstanceCache->getItem($key);

   

    if (!$CachedString->isHit()) {

        $carousels = AdvertisingSpace::with("advertisements")->where('code','=','A001')->first()->advertisements;
        $serviceItems = ServiceItem::select('id','title','thumbnail','summary')
                ->where('active',1)->where('active',1)->orderBy('importance','DESC')->get();

        $home_data = ['carousels' => $carousels,'serviceItems' => $serviceItems];

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities

 
        //echo $CachedString->get();

    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $carousels = AdvertisingSpace::with("advertisements")->where('code','=','A001')->first()->advertisements;
    $serviceItems = ServiceItem::select('id','title','thumbnail','summary')
                ->where('active',1)->where('active',1)->orderBy('importance','DESC')->get();

    $result = ['carousels' => $carousels,'serviceItems' => $serviceItems];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('index.html', $result);

?>