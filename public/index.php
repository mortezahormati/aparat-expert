<?php
require '../helper.php';
require basePath('Database.php');

require basePath('Router.php');
$router = new Router();
$routes = require basePath('routes.php');
//dd($routes);

$uri = $_SERVER['REQUEST_URI'];
$method_uri = $_SERVER['REQUEST_METHOD'];

$router->route($uri , $method_uri);

//dd($uri);
