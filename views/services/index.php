<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");


use Models\ServiceItem;


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = "serviceItems";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $serviceItems = ServiceItem::select('id','title','image_url','summary')
                ->where('active',1)->where('active',1)->orderBy('importance','DESC')->get();

        $apparea_data = ['serviceItems' => $serviceItems];

        $CachedString->set($apparea_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $serviceItems = ServiceItem::select('id','title','image_url','summary')
    ->where('active',1)->where('active',1)->orderBy('importance','DESC')->get();

    $result =  ['serviceItems' => $serviceItems];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('services/index.html', $result);

?>