<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Metadata;
use Models\Advertisement;
use Models\Job;
use JasonGrimes\Paginator;



$urlPattern = $lang=='zh-CN'? '/team/jobs/page-(:num)' : '/'.$lang.'/team/jobs/page-(:num)';
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$query = new Job;
 //搜索条件判断
$query = $query->with(['team' => function ($subQuery) {
            $subQuery->select('id', 'name', 'photo');
        }])->where('lang',$lang)
            ->where('active',1)
            ->select('id','title','team_id','created_at');


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

        $home_data = loadDate($lang,$commonData['mainav'],$query,$itemsPerPage,$currentPage,$urlPattern);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($lang,$commonData['mainav'],$query,$itemsPerPage,$currentPage,$urlPattern);

    //echo $metadata;
}

//load data
function loadDate($lang,$menus,$query,$itemsPerPage,$currentPage,$urlPattern){


    if($lang == 'zh-CN'){   
        $subnavs = $menus->where('url','/team')->first()->children;
        $metakey = '/team/jobs';  
    }else{     
        $subnavs = $menus->where('url','/'.$lang.'/team')->first()->children;
        $metakey = '/'.$lang.'/team/jobs';  
    }

   
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();  

 
    $code = $lang == 'zh-CN'?'A005': 'A005_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();


    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $jobs = $query->orderBy('importance', 'DESC')->orderBy('created_at', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();


    return  ['jobs' => $jobs,'paginator' => $paginator,'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel];
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


echo $twig->render('team/jobs.html', $result);

?>