<?php 
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
//If you want the errors to be shown  *是否显示错误
error_reporting(E_ALL);
ini_set('display_errors', '1');
use Illuminate\Database\Capsule\Manager as Capsule;

 $capsule = new Capsule;

 $capsule->addConnection([
    "driver" => "mysql",
    "host" =>"localhost",
    "port" => 3306,
    "database" => "qnzcms_php",
    "username" => "root",
    "password" => "root",
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
 ]);
//Make this Capsule instance available globally. *要让 capsule 能在全局使用
 $capsule->setAsGlobal();
// Setup the Eloquent ORM.
 $capsule->bootEloquent();

?>