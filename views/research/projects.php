<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;
use Models\Metadata;
use Models\Advertisement;
use Models\News;

$lang = isset($_GET['lang'])?$_GET['lang']:'zh-CN';  

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = $lang."_researches_projects";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($commonData['mainav']);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($commonData['mainav']);

    //echo $metadata;
}

//load data
function loadDate($menus){

    $lang = isset($_GET['lang'])?$_GET['lang']:'zh-CN';  

    if($lang == 'zh-CN'){      
        $subnavs = $menus->where('url','/researches')->first()->children;
    }else{   
        $subnavs = $menus->where('url','/'.$lang.'/researches')->first()->children;
    }

    $alias = 'projects';
   

    $data = Page::where('alias',$alias)->where('lang',$lang)->where('active',1)->first();
    if(isset($data)){
        $data->view_count = $data->view_count + 1;
        $data->save();
    }

    $metakey = $alias.'_'.$lang;  
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();

    
    $code = $lang == 'zh-CN'?'A004': 'A004_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();


    $articles = News::where('lang',$lang)->where('active',1)->where('category_id',14)
        ->select('id','thumbnail','title','lang','pubdate')->orderby('pubdate','DESC')->get();

    return  ['page' => $data, 'articles'=>$articles, 'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel];
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

echo $twig->render('researches/projects.html', $result);

?>