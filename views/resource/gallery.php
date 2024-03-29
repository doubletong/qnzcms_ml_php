<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Photo;
use Models\Metadata;

$metaKey = "/resource/gallery";
//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = '/pages/'.$alias;
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {
     
        
        $news_detail_data =  loadDate($metaKey);

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);     
   
    $result =  loadDate($metaKey);

}


//load data
function loadDate($metaKey){

    $photos = Photo::where('active',1)->orderBy('importance', 'DESC')->get();
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$metaKey)->first();       

    return  ['photos' => $photos,'metadata'=>$metadata];
}



$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('resource/gallery.html', $result);

?>