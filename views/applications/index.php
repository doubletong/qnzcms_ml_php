<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;
use Models\Metadata;
use Models\Video;

$alias = 'applications';  // $_GET['alias'];

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

        $home_data = loadDate($alias);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result = loadDate($alias);

    //echo $metadata;
}

//load data
function loadDate($alias){

    $data = Page::where('alias',$alias)->where('active',1)->first();
    if(isset($data)){
        $data->view_count = $data->view_count + 1;
        $data->save();
    }

    $videos = Video::where('active',1)->orderBy('importance', 'DESC')->get();  

    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias)->first();     

    return  ['page' => $data, 'metadata'=>$metadata,'videos'=>$videos];
}



$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('uri', $uri);


echo $twig->render('applications/index.html', $result);

?>