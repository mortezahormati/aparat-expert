<?php

require '../helper.php';

//loadView('home');
//require basePath('views/home.view.php');
$routes =[
  '/' => 'Controller/home.php',
  '/login' => 'Controller/auth/index.php',
  '404' => 'Controller/error/404.php',
  '/administrator' => 'Controller/admin/index.php' ,
];

$uri = $_SERVER['REQUEST_URI'];

//dd($uri);
if(array_key_exists($uri,$routes)){
    require basePath($routes[$uri]);
}else{
    require basePath($routes['404']);
}