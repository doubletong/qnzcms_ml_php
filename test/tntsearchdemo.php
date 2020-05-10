<?php 
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
use TeamTNT\TNTSearch\TNTSearch;

$tnt = new TNTSearch;

$tnt->loadConfig([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'qnzcms_php',
    'username'  => 'root',
    'password'  => 'root',
    'storage'   => $_SERVER['DOCUMENT_ROOT'].'/assets/tntsearch/',
    'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class   //optional
]);

//$indexer = $tnt->createIndex('name.index');
//$indexer->query('SELECT id, content FROM qnz_news;');
//$indexer->setLanguage('german');
//$indexer->run();

$tnt->selectIndex("name.index");
$res = $tnt->searchBoolean("composer");

print_r($res);

// $tnt->selectIndex("name.index");

// $index = $tnt->getIndex();
// print_r($index);