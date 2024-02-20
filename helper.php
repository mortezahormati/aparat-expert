<?php

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
 *load view
 * @param string $name
 * @return void
 *
 */
function loadPartial($name){
    $pathPartial = basePath("views/partials/{$name}.php");
    if(file_exists($pathPartial)){
        require $pathPartial;
    }else{
        echo "partial {$name} not existed";
    }
}








