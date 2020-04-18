<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\Download;
use Models\Metadata;

// if (!isset($_GET['alias'])) {
//     header('Location: /');
//     exit;
// } 
use JasonGrimes\Paginator;

$urlPattern = "/resource?page=(:num)";
$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$productQuery = new Download;
 //搜索条件判断
$query = $productQuery->select('id','title', 'thumbnail','file_url');

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = '/pages/'.$alias;
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $totalItems = $query->count();  //总记录数      
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $paginator->setMaxPagesToShow(6);

        $downloads = $query->orderBy('importance', 'DESC')
                    ->skip(($currentPage-1)*$itemsPerPage)
                    ->take($itemsPerPage)
                    ->get();
        // $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias)->first();       
        
        $news_detail_data = ['paginator' => $paginator,'downloads' => $downloads];

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $downloads = $query->orderBy('importance', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();
   
    $result =  ['paginator' => $paginator,'downloads' => $downloads];

}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('resource/index.html', $result);

?>