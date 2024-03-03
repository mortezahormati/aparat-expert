<?php

//return [
//    '/' => 'Controller/home.php',
//    '/login' => 'Controller/auth/index.php',
//    '404' => 'Controller/error/404.php',
//    '/administrator' => 'Controller/admin/index.php' ,
//];

//home
$router->get('/' , 'App/Controller/home.php');
//login
$router->get('/login' , 'App/Controller/auth/login.php');
//register
$router->get('/register' , 'App/Controller/auth/register.php');
//404
$router->get('404' , 'App/Controller/error/404.php');
//administrator -home
$router->get('/administrator' , 'App/Controller/admin/index.php');

////administrator - category
$router->get('/administrator/category' , 'App/Controller/admin/category/index.php');
//$router->get('/administrator/category/create' , 'App/Controller/admin/category/create.php');

$router->get('/administrator/category/ajax' , 'App/Controller/admin/category/ajax.request.php');
$router->get('/administrator/category/edit/ajax' , 'App/Controller/admin/category/edit/ajax.request.php');

$router->post('/administrator/category/ajax' , 'App/Controller/admin/category/ajax.request.php');
$router->post('/administrator/category/edit/ajax' , 'App/Controller/admin/category/edit/ajax.request.php');
//$router->get('/category' , 'Controller/admin/category/index.php');
//$router->get('/category/create' , 'Controller/admin/category/create.php');
//single-video-page
//$router->get('/single-video' , 'Controller/single-page.php');


