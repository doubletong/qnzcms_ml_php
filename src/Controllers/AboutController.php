<?php 
namespace QNZCMS\Controllers;

require_once($_SERVER['DOCUMENT_ROOT'] ."/data/page.php");


class HomePage {
    private $loader;
    public function __construct($loader) {
        $this-> loader = $loader;    
    }



    public  function index() {      

        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");     
       
        $pageClass = new TZGCMS\Page();
         //twig 模板设置
      
        if($site_info['enableCaching']=="1"){

            $twig = new \Twig\Environment($this-> loader, [
                'cache' => 'assets/caches',
            ]);
            // In your class, function, you can call the Cache
            $InstanceCache = CacheManager::getInstance('files');

            $key = "about";
            $CachedString = $InstanceCache->getItem($key);        

            if (!$CachedString->isHit()) {

                $page = $pageClass->fetch_data("about");   
                $home_data = ['page' => $page];

                $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
                $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities

            }

            $result = $CachedString->get();

        }else{
             
            $twig = new \Twig\Environment($this-> loader);  

            $page = $pageClass->fetch_data("about");   
            $result = ['page' => $page];
        }


       $twig->addGlobal('site', $site_info);
       $twig->addGlobal('menus', $menutree);
       $twig->addGlobal('navbot', $menus_bot);
       $twig->addGlobal('uri', $uri);


        echo $twig->render('about/index.html', $result);
        
    }
}


?>