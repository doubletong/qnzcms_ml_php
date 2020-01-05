<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/data/page.php");

$pageClass = new TZGCMS\Page();

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = "about";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $page = $pageClass->fetch_data("about");   
        $home_data = ['page' => $page];

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  
    $page = $pageClass->fetch_data("about");   
    $result = ['page' => $page];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);

echo $twig->render('support/index.html', $result);

?>