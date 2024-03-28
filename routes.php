<?php



//home
$router->get('/' , 'HomeController@index');
//channel-profile
$router->get('/channel/{channel_name}' , 'HomeController@channel');
$router->get('/category/{id}' , 'HomeController@category');
//login
$router->get('/login' , 'Auth\LoginController@create',['guest']);
$router->post('/login' , 'Auth\LoginController@login' , ['guest']);
$router->post('/logout' , 'Auth\LoginController@logout' , ['auth']);
////register
$router->get('/register' , 'Auth\RegisterController@create' , ['guest']);
$router->post('/register' , 'Auth\RegisterController@store' , ['guest']);
////404
////administrator -home
$router->get('/administrator' , 'Admin\DashboardController@index',['auth' ,'checkInfo']);
//
//////administrator - category
$router->get('/administrator/category' , 'Admin\CategoryController@index',['auth' , 'admin']);
$router->get('/administrator/category/ajax' , 'Admin\CategoryController@create',['auth' , 'admin']);
$router->post('/administrator/category/ajax' , 'Admin\CategoryController@create',['auth' , 'admin']);
$router->get('/administrator/category/edit/ajax' , 'Admin\CategoryController@update',['auth' , 'admin']);
$router->post('/administrator/category/edit/ajax' , 'Admin\CategoryController@update',['auth' , 'admin']);
$router->post('/administrator/category/delete/ajax' , 'Admin\CategoryController@delete',['auth' , 'admin']);

//administrator tags
$router->get('/administrator/tag' , 'Admin\TagController@index',['auth' , 'admin']);
$router->get('/administrator/tag/ajax' , 'Admin\TagController@create',['auth', 'admin']);
$router->post('/administrator/tag/ajax' , 'Admin\TagController@create',['auth','admin']);
$router->get('/administrator/tag/edit/ajax' , 'Admin\TagController@update',['auth', 'admin']);
$router->post('/administrator/tag/edit/ajax' , 'Admin\TagController@update',['auth' , 'admin']);
$router->post('/administrator/tag/delete/ajax' , 'Admin\TagController@delete',['auth' , 'admin']);


///administrator-users

$router->get('/administrator/users' , 'Admin\UserController@index' ,['auth' , 'admin'] );
$router->get('/administrator/users/create' , 'Admin\UserController@create',['auth','admin']);
$router->post('/administrator/users/create' , 'Admin\UserController@store',['auth','admin']);
$router->get('/administrator/users/{id}' , 'Admin\UserController@show',['auth','admin']);
$router->post('administrator/users/{id}' , 'Admin\UserController@update',['auth','admin']);
$router->post('/administrator/users/delete/{id}' , 'Admin\UserController@destroy',['auth','admin']);

//user-setting
$router->get('/administrator/user/setting' , 'User\UserController@show' , ['auth']);
$router->post('/administrator/user/setting/{id}' , 'User\UserController@update' , ['auth']);

//administrator-followers
$router->get('/administrator/followers' , 'Admin\UserController@followers',['auth']);


//administrator-video
$router->get('/administrator/videos','Admin\VideoController@index',['auth' ,'admin']);
$router->get('/administrator/video/user','Admin\VideoController@userIndex',['auth']);
//$router->get('/administrator/videos/create','Admin\VideoController@create');
//$router->get('/administrator/videos/create','Admin\VideoController@store');


// users
$router->get('/user/video/create' , 'User\VideoController@create',['auth' , 'checkCover']);
$router->get('/user/video/edit/{id}' , 'User\VideoController@show',['auth' , 'checkCover']);
$router->post('/user/video/edit/{id}' , 'User\VideoController@update',['auth' , 'checkCover']);
$router->post('/user/video/delete' , 'User\VideoController@destroy',['auth' , 'checkCover']);
$router->post('/user/video/create' , 'User\VideoController@store',['auth']);