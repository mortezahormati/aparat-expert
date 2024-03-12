<?php
require __DIR__.'/../vendor/autoload.php';
require '../helper.php';
use Framework\Router;
use Framework\Session;
Session::start();
Session::set('num1' , [
    'message' => 'hi'
]);
Session::set('num2' , 'hi2');


Session::clearAll();
dd(session_status());

$router = new Router();
$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);
$router->route($uri);


