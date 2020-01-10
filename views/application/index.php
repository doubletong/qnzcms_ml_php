<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/data/page.php");

use Models\ApplicationArea;


//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');
    
    $key = "about";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $applicationAreas = ApplicationArea::select('id','title')
            ->where("active","=",1)
            ->orderBy('importance', 'DESC')->get();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $applicationArea = ApplicationArea::where("active","=",1)->where('id','=',$id)->first();
        } else {
            $applicationArea = ApplicationArea::where("active","=",1)->orderBy('importance', 'DESC')->first();
        }    

        $apparea_data = ['applicationAreas' => $applicationAreas,'applicationArea'=>$applicationArea];

        $CachedString->set($apparea_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  

    $applicationAreas = ApplicationArea::select('id','title')
            ->where("active","=",1)
            ->orderBy('importance', 'DESC')->get();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $applicationArea = ApplicationArea::where("active","=",1)->where('id','=',$id)->first();
    } else {
        $applicationArea = ApplicationArea::where("active","=",1)->orderBy('importance', 'DESC')->first();
    }

    $result =  ['applicationAreas' => $applicationAreas,'applicationArea'=>$applicationArea];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);


echo $twig->render('application/index.html', $result);

?>