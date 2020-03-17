<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\Page;
use Models\Metadata;

if (!isset($_GET['alias'])) {
    header('Location: /');
    exit;
} 

$alias = $_GET['alias'];

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

        $data = Page::where('alias',$alias)->where('active',1)->first();
        $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias);       
        
        $news_detail_data = ['metadata' => $metadata,'page' => $data];

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $data = Page::where('alias',$alias)->where('active',1)->first();
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias);   
   
    $result =  ['metadata' => $metadata,'page' => $data];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);

echo $twig->render('pages/index.html', $result);

?>