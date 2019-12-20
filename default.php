<?php
use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;

require_once 'vendor/autoload.php';

CacheManager::setDefaultConfig(new ConfigurationOption([
    'path' => 'assets/caches/tmp', // or in windows "C:/tmp/"
]));

// In your class, function, you can call the Cache
$InstanceCache = CacheManager::getInstance('files');

$key = "product_page";
$CachedString = $InstanceCache->getItem($key);

$your_product_data = date('m/d/Y h:i:s a', time());

if (!$CachedString->isHit()) {
    $CachedString->set($your_product_data)->expiresAfter(5000);//in seconds, also accepts Datetime
    $InstanceCache->save($CachedString); // Save the cache item just like you do with doctrine and entities

    echo 'FIRST LOAD // WROTE OBJECT TO CACHE // RELOAD THE PAGE AND SEE // ';
    echo $CachedString->get();

} else {
    echo 'READ FROM CACHE // ';
    echo $CachedString->get()[0];// Will print 'First product'
}


$loader = new \Twig\Loader\FilesystemLoader('assets/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => 'assets/caches',
]);

echo $twig->render('index.html', ['name' => $CachedString->get()]);

?>