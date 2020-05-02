<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/data/article.php");


$articleClass = new TZGCMS\Article();
$did = 1;
if (!isset($_GET['id'])) {
    header('Location: /news');
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
    
    $key = "about";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $data = $articleClass->fetch_data($id);
        $prev = $articleClass->fetch_prev_data($id, $did);
        $next = $articleClass->fetch_next_data($id, $did);
        
        $news_detail_data = ['article' => $data,'prevArticle' => $prev, 'nextArticle' => $next];

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $data = $articleClass->fetch_data($id);
        $prev = $articleClass->fetch_prev_data($id, $did);
        $next = $articleClass->fetch_next_data($id, $did);
 
    $result =  ['article' => $data,'prevArticle' => $prev, 'nextArticle' => $next];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);

echo $twig->render('news/detail.html', $result);

?>