<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/loadCommonData.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\Product;
use Models\Metadata;
use JasonGrimes\Paginator;

$urlPattern = "/material?page=(:num)";
 //文章表实例化
 $productQuery = new Product;
 //搜索条件判断
 $query = $productQuery->select('id','title', 'thumbnail');

$itemsPerPage = 5;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

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

               
        $home_data = loadDate($query,$itemsPerPage,$currentPage,$urlPattern);

        $CachedString->set($home_data)->expiresAfter(5000);//in seconds, also accepts Datetime
        $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities
 
        //echo $CachedString->get();
    }

    $result = $CachedString->get();

}else{
    $twig = new \Twig\Environment($loader);        
   
    $result = loadDate($query,$itemsPerPage,$currentPage,$urlPattern);
}


//load data
function loadDate($query,$itemsPerPage,$currentPage,$urlPattern){

    $totalItems = $query->count();  //总记录数      
    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    $paginator->setMaxPagesToShow(6);

    $products = $query->orderBy('importance', 'DESC')
                ->skip(($currentPage-1)*$itemsPerPage)
                ->take($itemsPerPage)
                ->get();

    $product_id = isset($_GET['id'])?$_GET['id']:$products->first()->id;
    $product = Product::find($product_id); 

    $pageIndex = isset($_GET['page'])?$_GET['page']:1;

    $metadata = Metadata::where('module_type',ModuleType::PRODUCT())->where('key_value',$product_id)->first();       

    return ['paginator' => $paginator,'products'=>$products,'product'=>$product,'pageIndex'=>$pageIndex,'productId'=>$product_id,'metadata'=>$metadata];
}


$twig->addGlobal('site', $site_info);
$twig->addGlobal('menus', $menutree['mainav']);
$twig->addGlobal('breadcrumb', $menutree['breadcrumb']);
$twig->addGlobal('navbot', $menus_bot);
$twig->addGlobal('uri', $uri);

echo $twig->render('material/index.html', $result);

?>