<?php



//home
$router->get('/' , 'HomeController@index');
//login
$router->get('/login' , 'Auth\LoginController@login');
////register
$router->get('/register' , 'Auth\RegisterController@register');
////404
////administrator -home
$router->get('/administrator' , 'Admin\DashboardController@index');
//
//////administrator - category
$router->get('/administrator/category' , 'Admin\CategoryController@index');
////$router->get('/administrator/category/create' , 'App/Controller/admin/category/create.php');
//
//$router->get('/administrator/category/ajax' , 'App/Controller/admin/category/ajax.request.php');
//$router->get('/administrator/category/edit/ajax' , 'App/Controller/admin/category/edit/ajax.request.php');
//
//$router->post('/administrator/category/ajax' , 'App/Controller/admin/category/ajax.request.php');
//$router->post('/administrator/category/edit/ajax' , 'App/Controller/admin/category/edit/ajax.request.php');
//$router->get('/category' , 'Controller/admin/category/index.php');
//$router->get('/category/create' , 'Controller/admin/category/create.php');
//single-video-page
//$router->get('/single-video' , 'Controller/single-page.php');


