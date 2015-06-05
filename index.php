<?php

define('BASE_PATH', dirname(__FILE__));
define('DATA_PATH',BASE_PATH.'/Data/');
require_once './Zcp/AutoLoader.php';
require_once './vendor/autoload.php';
Twig_Autoloader::register();
Zcp\AutoLoader::load();
//    var_dump($_SERVER);
//    var_dump($request->getRequestType());
//    var_dump($request->getPathInfo());
$zcp = new Zcp\Bootstrap();
$zcp->start();



