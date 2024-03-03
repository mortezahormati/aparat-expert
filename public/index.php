<?php

require __DIR__.'/../vendor/autoload.php';

require '../helper.php';

use Framework\Router;




$router = new Router();
$routes = require basePath('routes.php');
//dd($routes);

//$uri = $_SERVER['REQUEST_URI'] ? fdfdfdf=fdff;
$uri = parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);


$method_uri = $_SERVER['REQUEST_METHOD'];

$router->route($uri , $method_uri);

//dd($uri);
