<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Lab;
use Models\Metadata;
use Models\Advertisement;
use Models\Team;

if (!isset($_GET['id'])) {
    header('Location: /platform/lab');
    exit;
} 

$id = $_GET['id'];


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = "lab_detail_$id";
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

    $data = Lab::find($id); 
    // $next = News::where('id','>',$id)->orderBy('id','ASC')->first();
    // $prev = News::where('id','<',$id)->orderBy('id','DESC')->first();

    if(isset($data)){
        $data->view_count=$data->view_count + 1;
        $data->save();

        $structures = explode('|', $data->structure);        
        $teams1 = Team::where('active',1)->whereIn('id',$structures)->orderBy('importance','DESC')->get();
        $committees = explode('|', $data->committee);
        $teams2 = Team::where('active',1)->whereIn('id',$committees)->orderBy('importance','DESC')->get();
    }

    if($lang == 'zh-CN'){     
        $subnavs = $menus->where('url','/platform')->first()->children;
    }else{      
        $subnavs = $menus->where('url','/'.$lang.'/platform')->first()->children;
    }

    $metadata = Metadata::where('module_type',ModuleType::NEWS())->where('key_value',$id)->first();       

   
    $code = $lang == 'zh-CN'?'A006': 'A006_'.$lang;
    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
        ->where('advertisements.active',1)
        ->where('advertising_spaces.code','=', $code)->first();



    return  ['lab' => $data, 'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel,'structures'=>$teams1,'committees'=>$teams2];
}

$uri = $lang=='zh-CN'?'/platform/lab':'/'.$lang.'/platform/lab';

$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);
$twig->addGlobal('lang', $lang);
$twig->addGlobal('resources', $GLOBALS['siteLang']);
$twig->addGlobal('links', $commonData['links']);

echo $twig->render($result['lab']->template, $result);

?>