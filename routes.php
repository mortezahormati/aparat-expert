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
$router->get('/administrator/category/ajax' , 'Admin\CategoryController@create');
$router->post('/administrator/category/ajax' , 'Admin\CategoryController@create');
$router->get('/administrator/category/edit/ajax' , 'Admin\CategoryController@update');
$router->post('/administrator/category/edit/ajax' , 'Admin\CategoryController@update');
$router->post('/administrator/category/delete/ajax' , 'Admin\CategoryController@delete');



///administrator-users

$router->get('/administrator/users' , 'Admin\UserController@index');
$router->get('/administrator/users/create' , 'Admin\UserController@create');
$router->post('/administrator/users/create' , 'Admin\UserController@store');
$router->get('/administrator/users/{id}' , 'Admin\UserController@show');
$router->post('administrator/users/update/{id}' , 'Admin\UserController@update');


//administrator-video
$router->get('/administrator/videos','Admin\VideoController@index');
$router->get('/administrator/videos/create','Admin\VideoController@create');
$router->get('/administrator/videos/create','Admin\VideoController@store');
