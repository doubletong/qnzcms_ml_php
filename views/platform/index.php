<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');


use Models\Metadata;
use Models\Advertisement;
use Models\Research;
use Models\Team;

$id = isset($_GET['id'])?$_GET['id']:null;

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = "platform_".$id;
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $home_data = loadDate($lang,$commonData['mainav']);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($lang,$commonData['mainav']);

    //echo $metadata;
}

//load data
function loadDate($lang,$menus){



    if($lang == 'zh-CN'){   
        $subnavs = $menus->where('url','/platform')->first()->children;
       
    }else{     
        $subnavs = $menus->where('url','/'.$lang.'/platform')->first()->children;
      
    }

    $researches = Research::where('active',1)->where('lang',$lang)->orderBy('importance', 'DESC')->get();
   

    if(isset($_GET['id'])){
        $research = $researches->where('id',$_GET['id'])->first();
    }else{
        $research = $researches->first();
    }

    if(isset($research)){

        $groups = explode('|', $research->research_group);        
        $teams = Team::where('active',1)->whereIn('id',$groups)->where('lang',$lang)->orderBy('importance','DESC')->get();
      
    }


    $code = $lang == 'zh-CN'?'A006': 'A006_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();



    $metadata = Metadata::where('module_type',ModuleType::RESEARCH())->where('key_value',$research->id)->first();

    return  ['subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel,'researches'=> $researches, 'research'=>$research, 'groups'=>$teams ];
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


echo $twig->render('platform/index.html', $result);

?>