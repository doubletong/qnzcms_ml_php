<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');


use Models\Metadata;
use Models\Advertisement;
use Models\Team;
use JasonGrimes\Paginator;
use Models\TeamCategory;


$cid = 2;
$urlPattern = $lang=='zh-CN'? '/team/deputy/page-(:num)' : '/'.$lang.'/team/deputy/page-(:num)';
$itemsPerPage = 24;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$query = new Team;
 //搜索条件判断
$query = $query->where('category_id',$cid)
    ->where('lang',$lang)
    ->where('active',1)
    ->select('id','name','photo','post','school');


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

        $home_data = loadDate($lang,$commonData['mainav'],$query,$itemsPerPage,$currentPage,$urlPattern,$cid);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($lang,$commonData['mainav'],$query,$itemsPerPage,$currentPage,$urlPattern,$cid);

    //echo $metadata;
}

//load data
function loadDate($lang,$menus,$query,$itemsPerPage,$currentPage,$urlPattern,$cid){   

    if($lang == 'zh-CN'){   
        $subnavs = $menus->where('url','/team')->first()->children;
        $metakey = '/team/deputy';  
    }else{     
        $subnavs = $menus->where('url','/'.$lang.'/team')->first()->children;
        $metakey = '/'.$lang.'/team/deputy';  
    }

    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();

    $fl = isset($_GET['fl'])?$_GET['fl']:null;  


    $code = $lang == 'zh-CN'?'A005': 'A005_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();

    if(isset($_GET['fl'])){    
        $query = $query->where('first_letter',$fl);
        //  $urlPattern = $urlPattern . "&fl=$fl";
        $urlPattern = $lang=='zh-CN'? '/team/deputy/'.$fl.'/page-(:num)' : '/'.$lang.'/team/deputy/'.$fl.'/page-(:num)';
    }


    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $teams = $query->orderBy('importance', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();

    $category = TeamCategory::find($cid);
    $titles = json_decode($category->title,true);
    $pageTitle = $titles[$lang];

    return  ['teams' => $teams,'paginator' => $paginator,'category'=>$pageTitle, 'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel,'fl'=>$fl];
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


echo $twig->render('team/higher.html', $result);

?>