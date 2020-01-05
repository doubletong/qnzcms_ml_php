<?php 
namespace QNZCMS\Controllers;

use Models\AdvertisingSpace;
require_once($_SERVER['DOCUMENT_ROOT'] ."/data/article.php");


class HomeController {
    private $loader,$site_info;
    public function __construct($loader) {
        $this-> loader = $loader;    
    }



    public  function index() {      

        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");     
       
        $articleClass = new \TZGCMS\Article();
         //twig 模板设置
      
        if($site_info['enableCaching']=="1"){

            $twig = new \Twig\Environment($this-> loader, [
                'cache' => 'assets/caches',
            ]);
            // In your class, function, you can call the Cache
            $InstanceCache = CacheManager::getInstance('files');

            $key = "home";
            $CachedString = $InstanceCache->getItem($key);        

            if (!$CachedString->isHit()) {

                $carousels = AdvertisingSpace::with("advertisements")->where('code','=','A001')->first()->advertisements;
                $recommendArticles = $articleClass->get_recommend_articles_bycategory(45, 3);

                $home_data = ['carousels' => $carousels,'articles' => $recommendArticles];

                $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
                $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities

            }

            $result = $CachedString->get();

        }else{
             
            $twig = new \Twig\Environment($this-> loader);  

            $carousels = AdvertisingSpace::with("advertisements")->where('code','=','A001')->first()->advertisements;
            $recommendArticles = $articleClass->get_recommend_articles_bycategory(45, 3);

            $result = ['carousels' => $carousels,'articles' => $recommendArticles];
        }


       $twig->addGlobal('site', $site_info);
       $twig->addGlobal('menus', $menutree);
       $twig->addGlobal('navbot', $menus_bot);
       $twig->addGlobal('uri', $uri);


        echo $twig->render('index.html', $result);
        
    }
}


?>