<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\ServiceItem;
use Models\Metadata;

if (!isset($_GET['id'])) {
    header('Location: /services');
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
    
    $key = "services/detail-$id";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $data = ServiceItem::find($id); 
        $metadata = Metadata::where('module_type',ModuleType::SERVICE())->where('key_value',$id)->first();       

        $news_detail_data = ['service' => $data,'metadata' => $metadata];

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $data = ServiceItem::find($id);        
    $metadata = Metadata::where('module_type',ModuleType::SERVICE())->where('key_value',"$id")->first();       

    $result =  ['service' => $data,'metadata' => $metadata];

  
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('services/detail.html', $result);

?>