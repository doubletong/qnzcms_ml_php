<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;
use Models\Metadata;

session_start();

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];


$alias = "quote";

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
        $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias)->first();       
        
        $news_detail_data = ['metadata' => $metadata,'page' => $data,'token'=>$token];

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $data = Page::where('alias',$alias)->where('active',1)->first();
    $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias)->first();   
   
    $result =  ['metadata' => $metadata,'page' => $data,'token'=>$token];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('quote/index.html', $result);

?>