<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Job;
use Models\Metadata;

if (!isset($_GET['id'])) {
    header('Location: /join');
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
    
    $key = "news_detail_$id";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $news_detail_data = loadDate($id);

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $result =  loadDate($id);  
}


function loadDate($id){

    $data = Job::find($id);   
    $metadata = Metadata::where('module_type',ModuleType::JOB())->where('key_value',$id)->first();     

    return  ['job' => $data, 'metadata'=>$metadata];
}



$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $commonData['mainav']);
$twig->addGlobal('breadcrumb', $commonData['breadcrumb']);
$twig->addGlobal('navbot', $commonData['menus_bot']);
$twig->addGlobal('uri', $uri);


echo $twig->render('join/detail.html', $result);

?>