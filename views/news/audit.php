<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\News;
use Models\Metadata;
use Models\Advertisement;

if (!isset($_GET['code'])) {
    header('Location: /news');
    exit;
} 

$code = $_GET['code'];


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = "news_detail_$id";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {
    
        $news_detail_data = loadDate($commonData['menus_bot'],$lang,$id);

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result =  loadDate($commonData['menus_bot'],$lang,$id);
  
}


//load data
function loadDate($menus,$lang,$id){

    $data = News::find($id); 
    // $next = News::where('id','>',$id)->orderBy('id','ASC')->first();
    // $prev = News::where('id','<',$id)->orderBy('id','DESC')->first();

    if(isset($data)){
        $data->view_count=$data->view_count + 1;
        $data->save();
    }

    if($lang == 'zh-CN'){     
        $subnavs = $menus->where('url','/news')->first()->children;
    }else{      
        $subnavs = $menus->where('url','/'.$lang.'/news')->first()->children;
    }

    $metadata = Metadata::where('module_type',ModuleType::NEWS())->where('key_value',$id)->first();       

   
    $code = $lang == 'zh-CN'?'A009': 'A009_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();




    return  ['article' => $data, 'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel];
}

$uri = $lang=='zh-CN'?'/news':'/'.$lang.'/news';

$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);
$twig->addGlobal('lang', $lang);
$twig->addGlobal('resources', $GLOBALS['siteLang']);
$twig->addGlobal('links', $commonData['links']);

echo $twig->render('news/detail.html', $result);

?>