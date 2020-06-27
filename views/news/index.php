<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\News;
use Models\Metadata;
use JasonGrimes\Paginator;
use Models\NewsCategory;
use Models\Advertisement;

$metaKey = "/news";
$cid = null;
$urlPattern = "/news?page=(:num)";
$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$newsQuery = new News;
 //搜索条件判断
$query = $newsQuery->with(['category' => function ($query) {
    $query->select('id', 'title');
}])->select('id','title', 'thumbnail','summary','author','pubdate','category_id');

if(isset($_REQUEST["cid"]) && $_REQUEST["cid"] != ""){
    $cid = htmlspecialchars($_REQUEST["cid"],ENT_QUOTES);
    $querycateogries = NewsCategory::where('parent','=',$cid)->orwhere('id','=',$cid)->select('id')->get();
    $query = $query->whereIn('category_id',$querycateogries);         
      
    $urlPattern = $urlPattern . "&cid=$cid";
}

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = 'news_index';
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {          
        
        $news_detail_data = loadDate($commonData['menus_bot'], $metaKey,$query,$itemsPerPage,$currentPage,$urlPattern,$cid);

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

   
    $result =  loadDate($commonData['menus_bot'], $metaKey,$query,$itemsPerPage,$currentPage,$urlPattern,$cid);

}



//load data
function loadDate($menus, $metaKey,$query,$itemsPerPage,$currentPage,$urlPattern,$cid){

    $subnavs = $menus->where('url','/news')->first()->children;


    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $news = $query->orderBy('importance', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();

    $categories = NewsCategory::where('active',1)->orderBy('importance', 'DESC')->get();

    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metaKey)->first();      

    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
    ->where('advertisements.active',1)
    ->where('advertising_spaces.code','=','A009')->first();
    
 

    return  ['subnavs'=>$subnavs, 'paginator' => $paginator,'news' => $news,'metadata'=>$metadata,'categories'=>$categories,'categoryId' => $cid,'carousel'=>$carousel];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);

echo $twig->render('news/index.html', $result);

?>