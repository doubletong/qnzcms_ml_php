<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');


use JasonGrimes\Paginator;
use Models\News;
use Models\Metadata;
use Models\NewsCategory;

// if(!isset($_REQUEST["keyword"]) || $_REQUEST["keyword"] == ""){
//     if($lang == 'zh-CN'){
//         header('Location: /');
//     }else{
//         header('Location: /'.$lang);     
//     }  
//     exit;
// }


$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$newsQuery = new News;
 //搜索条件判断
$query = $newsQuery->with(['category' => function ($query) {
    $query->select('id', 'title');
}])->where('active',1)->where('lang',$lang)->select('id','title', 'thumbnail','summary','author','pubdate','category_id');



//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = $lang."_search_$keyword";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {
           
        $news_data = loadDate($query,$itemsPerPage,$currentPage,$lang);

        $CachedString->set($news_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  
    

    $result = loadDate($query,$itemsPerPage,$currentPage,$lang);
    
}



//load data
function loadDate($query,$itemsPerPage,$currentPage,$lang){

    $keyword = isset($_GET['keyword'])?$_GET['keyword']:null;
    $paginator = null;
    $totalItems = 0;
    $news = [];
    if(isset($keyword)){
        $cateogries = NewsCategory::where('parent','=',1)->orwhere('id','=',1)->select('id')->get();    
        $query = $query->whereIn('category_id',$cateogries);
    
       
        $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);
        $query = $query->where('title','like','%'.$keyword.'%');         
            
    
        $urlPattern = $lang=='zh-CN'? '/search/'.$keyword.'/page-(:num)': '/'.$lang.'/search/'.$keyword.'/page-(:num)';
        //$urlPattern = $urlPattern . "&cid=$cid";  
    
        $totalItems = $query->count();  //总记录数      
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $paginator->setMaxPagesToShow(6);
    
        $news = $query->orderBy('pubdate', 'DESC')
                    ->skip(($currentPage-1)*$itemsPerPage)
                    ->take($itemsPerPage)
                    ->get();

    }

    
    return  ['paginator' => $paginator,'news' => $news,  'articleCount'=>$totalItems, 'keyword'=>$keyword];
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

echo $twig->render('search/index.html', $result);

?>