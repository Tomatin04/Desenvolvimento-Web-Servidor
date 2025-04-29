<?php

session_start();
session_regenerate_id();

require_once __DIR__ . "/../vendor/autoload.php";
use App\Controllers\Controller;
use App\Repository\CandidateRepository;

$routes = require __DIR__ . "/../config/routes.php";

$path = __DIR__ . "/../BD.sqlite";
$pdo = new PDO("sqlite:$path");
$repository = new CandidateRepository($pdo);

$path_info = $_SERVER['PATH_INFO'] ?? '/';
$http_method = $_SERVER['REQUEST_METHOD'];

$key = "$http_method|$path_info";

if (!array_key_exists('login_on', $_SESSION) && !($path_info === '/login')) {
    header('Location: /login');
    return;
}

if(array_key_exists($key, $routes)){
    $controllerClass = $routes["$http_method|$path_info"];
    $controller = new $controllerClass($repository);
}else{
    $controller;
}

/** @var Controller $controller */
$controller->request();
