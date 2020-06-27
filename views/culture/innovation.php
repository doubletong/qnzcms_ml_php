<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;
use Models\Metadata;
use Models\Advertisement;


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

        $home_data = loadDate($commonData['menus_bot']);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($commonData['menus_bot']);

    //echo $metadata;
}

//load data
function loadDate($menus){

    $alias = 'innovation';  

    $data = Page::where('alias',$alias)->where('active',1)->first();
    if(isset($data)){
        $data->view_count = $data->view_count + 1;
        $data->save();
    }

    $subnavs = $menus->where('url','/culture')->first()->children;
  

    $carousel = Advertisement::select('advertisements.*')->join('advertising_spaces', 'advertisements.space_id', '=', 'advertising_spaces.id')
    ->where('advertisements.active',1)
    ->where('advertising_spaces.code','=','A011')->first();
    


    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias)->first();

    return  ['page' => $data,'subnavs' => $subnavs, 'metadata'=>$metadata,'carousel'=>$carousel];
}



$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('navtop', $commonData['menus_top']);
$twig->addGlobal('uri', $uri);


echo $twig->render('culture/committee.html', $result);

?>