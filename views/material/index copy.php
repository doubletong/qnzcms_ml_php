<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");


use Models\Product;
use Models\ProductCategory;

$cid= isset($_GET['cid'])?$_GET['cid']:null;
$subcid= isset($_GET['subcid'])?$_GET['subcid']:null;

//twig 模板设置
$loader = new \Twig\Loader\FilesystemLoader(array('../../assets/templates'));

if($site_info['enableCaching']=="1"){

    $twig = new \Twig\Environment($loader, [
        'cache' => '../../assets/caches',
    ]);
    // In your class, function, you can call the Cache
    // $InstanceCache = CacheManager::getInstance('files');

    $key = "products";
    $CachedString = $InstanceCache->getItem($key);   

    if (!$CachedString->isHit()) {

        $categories = ProductCategory::where("active","=",1)->where('parent','=',null)->orderBy('importance', 'DESC')->get();   
        $category = isset($cid)?
                ProductCategory::with('children')->where("active","=",1)->where('id','=',$cid)->first()
                :ProductCategory::with('children')->where("active","=",1)->where('parent','=',null)->orderBy('importance', 'DESC')->first();

        $subCategories = $category->children;   
        
        $subcid = isset($subcid)?$subcid:($subCategories->isNotEmpty()?$subCategories->first()->id:null);
        $products = isset($subcid)?
                Product::where("active","=",1)->where('category_id','=',$subcid)->orderby('importance','DESC')->get()
                :(Product::where("active","=",1)->where('category_id','=',$category->id)->orderby('importance','DESC')->get()); 
        
        $home_data = ['categories' => $categories,'category'=>$category,'subCategories'=>$subCategories,'products'=>$products,'subcid'=>$subcid];

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);  
   
    $categories = ProductCategory::where("active","=",1)->where('parent','=',null)->orderBy('importance', 'DESC')->get();   
    $category = isset($cid)?
            ProductCategory::with('children')->where("active","=",1)->where('id','=',$cid)->first()
            :ProductCategory::with('children')->where("active","=",1)->where('parent','=',null)->orderBy('importance', 'DESC')->first();

    $subCategories = $category->children;   
    
    $subcid = isset($subcid)?$subcid:($subCategories->isNotEmpty()?$subCategories->first()->id:null);
    $products = isset($subcid)?
            Product::where("active","=",1)->where('category_id','=',$subcid)->orderby('importance','DESC')->get()
            :(Product::where("active","=",1)->where('category_id','=',$category->id)->orderby('importance','DESC')->get());    
   
    $result = ['categories' => $categories,'category'=>$category,'subCategories'=>$subCategories,'products'=>$products,'subcid'=>$subcid];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);

echo $twig->render('material/index.html', $result);

?>