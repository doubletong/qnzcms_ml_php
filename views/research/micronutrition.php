<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;
use Models\News;
use JasonGrimes\Paginator;
use Models\Metadata;
use Models\Advertisement;

$cid = 5;

$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数
 //文章表实例化
$newsQuery = new News;
 //搜索条件判断
$query = $newsQuery->with(['category' => function ($query) {
    $query->select('id', 'title');
}])->where('category_id',$cid)->where('active',1)->where('lang',$lang)->select('id','title', 'thumbnail','summary','author','pubdate','category_id');



//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = $lang.'_RESEARCH_MICRONUTRITION_'.$currentPage;
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($commonData['mainav'],$lang, $query,$itemsPerPage,$currentPage,$cid);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($commonData['mainav'],$lang, $query,$itemsPerPage,$currentPage,$cid);

    //echo $metadata;
}

//load data
function loadDate($menus,$lang,$query,$itemsPerPage,$currentPage,$cid){
    $alias = 'micronutrition';  
    $data = Page::where('alias',$alias)->where('lang',$lang)->where('active',1)->first();
    if(isset($data)){
        $data->view_count = $data->view_count + 1;
        $data->save();
    }

    $curent_url = "/{$lang}/research/{$alias}";
    // $current_menu = $menus->where('url',$curent_url)->first();
    // $subnavs = $current_menu->children;

    $urlPattern = '/'.$lang.'/research/micronutrition/page-(:num)';
    //$urlPattern = $urlPattern . "&cid=$cid";  

    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $news = $query->orderBy('pubdate', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();


    // $newsvm = array();  
    // foreach($news as $item){
    //     $titles = json_decode($item->category->title,true);
    //     $newItem = array("id"=>$item->id,'title'=>$item->title,'thumbnail'=>$item->thumbnail,'pubdate'=>$item->pubdate,'category_title'=>$titles[$lang]);
    //     array_push($newsvm,$newItem );
    // }


    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
    ->where('advertisements.lang', $lang)->where('advertisements.active',1)
    ->where('advertising_spaces.code','=','A004')->first();

    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$curent_url)->first();

    return  ['page'=>$data,'articles' => $news, 'paginator' => $paginator, 'metadata'=>$metadata,'carousel'=>$carousel];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
// $twig->addGlobal('navbot', $commonData['menus_bot']);
// $twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);
$twig->addGlobal('lang', $lang);
$twig->addGlobal('resources', $GLOBALS['siteLang']);
// $twig->addGlobal('links', $commonData['links']);

echo $twig->render('research/micronutrition.twig', $result);

?>