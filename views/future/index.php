<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');


use Models\Metadata;
use Models\Advertisement;
use Models\Video;
use JasonGrimes\Paginator;



$urlPattern = $lang=='zh-CN'? '/future/page-(:num)': $lang.'/future/page-(:num)';

$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$newsQuery = new Video;
 //搜索条件判断
$query = $newsQuery->where('active',1)->where('lang',$lang)->select('id','title', 'poster','file_url','category_id');


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = $lang."_future_page_".$currentPage;
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($lang,$commonData['menus_top'],$query,$itemsPerPage,$currentPage,$urlPattern);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($lang,$commonData['menus_top'],$query,$itemsPerPage,$currentPage,$urlPattern);

    //echo $metadata;
}

//load data
function loadDate($lang,$menus,$query,$itemsPerPage,$currentPage,$urlPattern){

   

    if($lang == 'zh-CN'){
        $metakey = '/news';
        $subnavs = $menus->where('url','/future')->first()->children;
    }else{
        $metakey = '/'.$lang.'/news';
        $subnavs = $menus->where('url','/'.$lang.'/future')->first()->children;
    }

    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();


    $code = $lang == 'zh-CN'?'A010': 'A010_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();


    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $videos = $query->orderBy('importance', 'DESC')->orderBy('id', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();
    


    return  ['videos' => $videos,'paginator' => $paginator,'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel];
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

echo $twig->render('future/index.html', $result);

?>