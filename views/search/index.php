<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/data/article.php");


use JasonGrimes\Paginator;


$articleClass = new TZGCMS\Article();

$keyword = isset($_GET['keyword'])?$_GET['keyword']:"";



//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = "search_$keyword";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {
           
        $articles = !empty($_GET['keyword'])?$articleClass->search_paged($keyword,1,PHP_INT_MAX):null;
        $articleCount = !empty($_GET['keyword'])?$articleClass->search_count($keyword):0;

        $news_data = ['articles' => $articles,'articleCount' => $articleCount,'keyword'=>$keyword];

        $CachedString->set($news_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  
    
    $articles = !empty($_GET['keyword'])?$articleClass->search_paged($keyword,1,PHP_INT_MAX):null;
    $articleCount = !empty($_GET['keyword'])?$articleClass->search_count($keyword):0;  

    $result = ['articles' => $articles,'articleCount' => $articleCount,'keyword'=>$keyword];
    
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);

echo $twig->render('search/index.html', $result);

?>