<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\QuestionCategory;
use Models\Metadata;


 //文章表实例化
$newsQuery = new QuestionCategory;
 //搜索条件判断
$query = $newsQuery->with('questions')->select('id','title');

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = '/resource/faq';
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

       
        $categories = $query->orderBy('importance', 'DESC')->get();
        // $metadata = Metadata::where('module_type',ModuleType::URL())->where('key_value',$alias)->first();       
        
        $news_detail_data = ['categories' => $categories];

        $CachedString->set($news_detail_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $categories = $query->orderBy('importance', 'DESC')->get();
   
    $result =  ['categories' => $categories];

}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('resource/faq.html', $result);

?>