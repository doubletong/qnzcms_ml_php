<?php 
ini_set ('memory_limit', '128M')  ;

require $_SERVER['DOCUMENT_ROOT']."/app/Handlers/TokenizerHandler.php";
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
use TeamTNT\TNTSearch\TNTSearch;



$tokenizerHandler = new TokenizerHandler;
$tnt = new TNTSearch;
$tnt->setTokenizer($tokenizerHandler);

$tnt->loadConfig([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'qnzcms_php',
    'username'  => 'root',
    'password'  => 'root',
    'storage'   => $_SERVER['DOCUMENT_ROOT'].'/assets/tntsearch/',
    'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class   //optional
]);

$indexer = $tnt->createIndex('article.index');
$indexer->query('SELECT id, content FROM qnz_news;');
//$indexer->setLanguage('german');
$indexer->run();