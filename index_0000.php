<?php



require 'vendor/autoload.php';
require_once 'src/Controllers/HomeController.php';

//$loader = new \Twig\Loader\FilesystemLoader(array('assets/templates'));

// Register your class
Flight::register('loader', '\Twig\Loader\FilesystemLoader', array('assets/templates'));

// Get an instance of your class



// Flight::route('/', function(){
//     $loader = Flight::loader();

//     $homeContr = new \QNZCMS\Controllers\HomeController($loader);
//     $homeContr->index();
// });

Flight::route('/about', function(){
    $loader = Flight::loader();

    $aboutContr = new \QNZCMS\Controllers\HomePage($loader);
    $aboutContr->index();
});


Flight::start();

?>