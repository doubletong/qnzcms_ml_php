<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');


use Models\Metadata;
use Models\Advertisement;
use Models\Team;


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = $lang."_about_leadership";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($commonData['mainav'],$lang);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($commonData['mainav'],$lang);

    //echo $metadata;
}

//load data
function loadDate($menus,$lang){



    if($lang == 'zh-CN'){
        $metakey = '/about/leadership';
        $subnavs = $menus->where('url','/about')->first()->children;
    }else{
        $metakey = '/'.$lang.'/about/leadership';
        $subnavs = $menus->where('url','/'.$lang.'/about')->first()->children;
    }
   
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metakey)->first();    

    
  
    $code = $lang == 'zh-CN'?'A003': 'A003_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=',$code)->first();


    $teams = Team::where('active',1)->where('lang',$lang)->where('category_id',4)->orderby('importance','DESC')->get();
    

    return  ['teams' => $teams,'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel];
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


echo $twig->render('about/leadership.html', $result);

?>