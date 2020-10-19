<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Event;
use Models\Metadata;
use JasonGrimes\Paginator;
use Models\Advertisement;


$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$newsQuery = new Event;
 //搜索条件判断
$query = $newsQuery->with(['category' => function ($query) {
    $query->select('id', 'title');
}])->where('active',1)->select('id','title', 'thumbnail','summary','compere','address','datestart','category_id');



//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = $lang.'_events_page'.$currentPage;
    
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {          
        
        $news_detail_data = loadDate($commonData['menus_bot'], $query,$itemsPerPage,$currentPage,$urlPattern);

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

   
    $result =  loadDate($commonData['menus_bot'],$query,$itemsPerPage,$currentPage);

}



//load data
function loadDate($menus, $query,$itemsPerPage,$currentPage){

    $lang = isset($_GET['lang'])?$_GET['lang']:'zh-CN';  

    if($lang == 'zh-CN'){
        $metakey = '/news';
        $subnavs = $menus->where('url','/news')->first()->children;
    }else{
        $metakey = '/'.$lang.'/news';
        $subnavs = $menus->where('url','/'.$lang.'/news')->first()->children;
    }
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();      



    $urlPattern = $lang=='zh-CN'? '/news/meeting/page-(:num)': '/'.$lang.'/news/compere/page-(:num)';
    //$urlPattern = $urlPattern . "&cid=$cid";  

    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $events = $query->orderBy('datestart', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();



    $code = $lang == 'zh-CN'?'A009': 'A009_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();
               
 

    return  ['subnavs'=>$subnavs, 'paginator' => $paginator,'events' => $events,'metadata'=>$metadata, 'carousel'=>$carousel];
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

echo $twig->render('news/meeting.html', $result);

?>