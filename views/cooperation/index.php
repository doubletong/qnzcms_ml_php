<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');


use Models\Metadata;
use Models\Advertisement;
use Models\News;
use Models\NewsCategory;
use JasonGrimes\Paginator;

$cid = null;
$category = null;
$urlPattern = "/cooperation?page=(:num)";
$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$newsQuery = new News;
 //搜索条件判断
$query = $newsQuery->with(['category' => function ($query) {
    $query->select('id', 'title');
}])->where('active',1)->select('id','title', 'thumbnail','summary','author','pubdate','category_id');


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = "pages_about";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($commonData['mainav'],$query,$itemsPerPage,$currentPage,$urlPattern,$cid);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($commonData['mainav'],$query,$itemsPerPage,$currentPage,$urlPattern,$cid);

    //echo $metadata;
}

//load data
function loadDate($menus, $query,$itemsPerPage,$currentPage,$urlPattern,$cid){

    $metakey = '/cooperation';  

    $subnavs = $menus->where('url','/cooperation')->first()->children;
  

    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=','A008')->first();


    $categories = NewsCategory::where('active',1)->where('parent',9)->orderBy('importance', 'DESC')->get();

    if(isset($_REQUEST["cid"]) && $_REQUEST["cid"] != ""){
        $cid = htmlspecialchars($_REQUEST["cid"],ENT_QUOTES);   
        $category = $categories->where('id',$cid)->first();
        $query = $query->where('category_id',$cid);
        
    }else{
        $category = $categories->first();
        
        if(!empty($category)){
            $cid = $category->id;
            $query = $query->where('category_id',$cid);
        }
    }
    
    $urlPattern = $urlPattern . "&cid=$cid";
        
    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $articles = $query->orderBy('importance', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();


    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();

    return  ['subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel, 'paginator' => $paginator,
    'articles' => $articles,'metadata'=>$metadata,'category'=>$category,'categoryId' => $cid];
}



$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);


echo $twig->render('cooperation/index.html', $result);

?>