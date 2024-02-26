<?php

//return [
//    '/' => 'Controller/home.php',
//    '/login' => 'Controller/auth/index.php',
//    '404' => 'Controller/error/404.php',
//    '/administrator' => 'Controller/admin/index.php' ,
//];

//home
$router->get('/' , 'Controller/home.php');
//login
$router->get('/login' , 'Controller/auth/login.php');
//register
$router->get('/register' , 'Controller/auth/register.php');
//404
$router->get('404' , 'Controller/error/404.php');
//administrator
$router->get('/administrator' , 'Controller/admin/index.php');

//single-video-page
$router->get('/single-video' , 'Controller/single-page.php');


