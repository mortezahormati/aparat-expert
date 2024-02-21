<?php

//return [
//    '/' => 'Controller/home.php',
//    '/login' => 'Controller/auth/index.php',
//    '404' => 'Controller/error/404.php',
//    '/administrator' => 'Controller/admin/index.php' ,
//];


$router->get('/' , 'Controller/home.php');
$router->get('/login' , 'Controller/auth/index.php');
$router->get('404' , 'Controller/error/404.php');
$router->get('/administrator' , 'Controller/admin/index.php');



