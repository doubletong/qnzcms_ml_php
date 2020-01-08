<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/data/article.php");


use JasonGrimes\Paginator;


$articleClass = new TZGCMS\Article();
$did = 1;
$categories = $articleClass->get_categories($did);

$urlPattern = "/news?page=(:num)";

$cid = isset($_GET['cid']) ? $_GET['cid'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($cid)) {
    $urlPattern = $urlPattern . "&cid=$cid";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}
$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数




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

        $totalItems = $articleClass->get_articles_count_v1($did, $cid, $keyword);  //总记录数
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $paginator->setMaxPagesToShow(6);
        $articles = $articleClass->get_paged_articles_v1($did, $cid, $keyword, $currentPage, $itemsPerPage);
        
        $news_data = ['articles' => $articles,'paginator' => $paginator];

        $CachedString->set($news_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $totalItems = $articleClass->get_articles_count_v1($did, $cid, $keyword);  //总记录数
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);
    $articles = $articleClass->get_paged_articles_v1($did, $cid, $keyword, $currentPage, $itemsPerPage);
 
    $result = ['articles' => $articles,'paginator' => $paginator];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);

echo $twig->render('news/index.html', $result);

?>