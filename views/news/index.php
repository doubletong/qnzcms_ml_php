<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\News;
use Models\Metadata;
use JasonGrimes\Paginator;
use Models\NewsCategory;
use Models\Advertisement;



$cid = isset($_GET['cid'])?$_GET['cid']:null;


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
    
    $key = $lang.'_news_category_'.$cid.'_page'.$currentPage;
    
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {          
        
        $news_detail_data = loadDate($commonData['menus_bot'], $query,$itemsPerPage,$currentPage,$urlPattern,$cid);

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

   
    $result =  loadDate($commonData['menus_bot'],$query,$itemsPerPage,$currentPage,$cid);

}



//load data
function loadDate($menus, $query,$itemsPerPage,$currentPage,$cid){

    $lang = isset($_GET['lang'])?$_GET['lang']:'zh-CN';  

    if($lang == 'zh-CN'){
        $metakey = '/news';
        $subnavs = $menus->where('url','/news')->first()->children;
    }else{
        $metakey = '/'.$lang.'/news';
        $subnavs = $menus->where('url','/'.$lang.'/news')->first()->children;
    }
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();      


    $catelistvm = array();
    $categories = NewsCategory::where('active',1)->where('parent',1)->orderBy('importance', 'DESC')->get();
    foreach($categories as $item){
        $titles = json_decode($item->title,true);
        $newItem = array("id"=>$item->id,'title'=>$titles[$lang]);
        array_push($catelistvm,$newItem );
    }
    

    if(isset($_REQUEST["cid"]) && $_REQUEST["cid"] != ""){
        $cid = htmlspecialchars($_REQUEST["cid"],ENT_QUOTES);
    
       // $querycateogries = NewsCategory::where('parent','=',$cid)->orwhere('id','=',$cid)->select('id')->get();    
       // $query = $query->whereIn('category_id',$querycateogries);         
          
       $query = $query->where('category_id',$cid);
      
    }else{
        $c = $categories->first();
        
        if(!empty($c)){
            $cid = $c->id;
            $query = $query->where('category_id',$cid);
        }

    }
    $urlPattern = $lang=='zh-CN'? '/news/c'.$cid.'/page-(:num)': '/'.$lang.'/news/c'.$cid.'/page-(:num)';
    //$urlPattern = $urlPattern . "&cid=$cid";  

    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $news = $query->orderBy('pubdate', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();


    $newsvm = array();  
    foreach($news as $item){
        $titles = json_decode($item->category->title,true);
        $newItem = array("id"=>$item->id,'title'=>$item->title,'thumbnail'=>$item->thumbnail,'pubdate'=>$item->pubdate,'category_title'=>$titles[$lang]);
        array_push($newsvm,$newItem );
    }

    $code = $lang == 'zh-CN'?'A009': 'A009_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();


    return  ['subnavs'=>$subnavs, 'paginator' => $paginator,'news' => $newsvm,'metadata'=>$metadata,'categories'=>$catelistvm,'categoryId' => $cid,'carousel'=>$carousel];
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


echo $twig->render('news/index.html', $result);

?>