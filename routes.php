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
//administrator -home
$router->get('/administrator' , 'Controller/admin/index.php');

////administrator - category
$router->get('/administrator/category' , 'Controller/admin/category/index.php');
//$router->get('/administrator/category/create' , 'Controller/admin/category/create.php');

$router->get('/administrator/category/ajax' , 'Controller/admin/category/ajax.request.php');
$router->post('/administrator/category/ajax' , 'Controller/admin/category/ajax.request.php');
//$router->get('/category' , 'Controller/admin/category/index.php');
//$router->get('/category/create' , 'Controller/admin/category/create.php');
//single-video-page
$router->get('/single-video' , 'Controller/single-page.php');


