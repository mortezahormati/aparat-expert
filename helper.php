<?php

const BASE_URL = 'http://aparat-expert.local/';

/**
 * get the base path of file in root
 *@param string $path
 *@return string
 */


//__DIR__
//__LINE__
//__FILE__
//__class__
//__NameSpace__
//
//$result = basePath('views/home.view.php');
function basePath($path = ''){
    return __DIR__.'/'.$path;
}

/**
 *load view
 * @param string $name
 * @return void
 *
 */


//loadView('home')
function loadView($name)
{
    //check file
    $pathView = basePath("views/{$name}.view.php");
    if(file_exists($pathView)){
        require $pathView;
    }else{
        echo "view {$name} not existed";
    }

}

/**
 *admin view
 * @param string $name
 * @return void
 *
 */


//loadView('home')
function adminView($name , $data=[])
{
    //check file
    $pathView = basePath("views/admin/{$name}.view.php");
    if(file_exists($pathView)){

        extract($data);
        require $pathView;
    }else{
        echo "view {$name} not existed";
    }

}

/**
 *load view
 * @param string $name
 * @return void
 *
 */
function loadPartial($name){
    $pathPartial = basePath("views/partials/{$name}.php");
//    dd($pathPartial);
    if(file_exists($pathPartial)){
        require $pathPartial;
    }else{
        echo "partial {$name} not existed";
    }
}

/**
 *admin partial
 * @param string $name
 * @return void
 *
 */
function loadAdminPartial($name){
    $pathPartial = basePath("views/partials/admin/{$name}.php");
//    dd($pathPartial);
    if(file_exists($pathPartial)){
        require $pathPartial;
    }else{
        echo "partial {$name} not existed";
    }
}



/**
 *inspector function
 * @param mixed $variable
 * @return void
 *
 */
function inspect($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

/**
 *die and dump function
 * @param mixed $variable
 * @return void
 *
 */
function dd($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    die();
}



function asset($name){
    return BASE_URL."$name";
}










