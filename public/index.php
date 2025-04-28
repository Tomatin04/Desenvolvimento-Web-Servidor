<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";
use App\Controllers\Controller;

$routes = require __DIR__ . "/../config/routes.php";

$path_info = $_SERVER['PATH_INFO'] ?? '/';
$http_method = $_SERVER['REQUEST_METHOD'];

$key = "$http_method|$path_info";

if (!array_key_exists('login_on', $_SESSION) && !($path_info === '/login')) {
    header('Location: /login');
    return;
}

if(array_key_exists($key, $routes)){
    $controller = new $routes["$http_method|$path_info"];
}else{
    $controller = new $routes["$http_method|$path_info"];
}


/** @var Controller $controller */
$controller->request();
