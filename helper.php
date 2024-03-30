<?php

use Morilog\Jalali\Jalalian;



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
function loadView($name , $data=[])
{
    //check file
    $pathView = basePath("App/views/{$name}.view.php");
    if(file_exists($pathView)){
        extract($data);
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
    $pathView = basePath("App/views/admin/{$name}.view.php");
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
    $pathPartial = basePath("App/views/partials/{$name}.php");
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
function loadAdminPartial($name , $data=[]){
    $pathPartial = basePath("App/views/partials/admin/{$name}.php");
//    dd($pathPartial);
    if(file_exists($pathPartial)){
        extract($data);
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


/**
 *sanitize function
 * @param string $dirty
 * @return string
 *
 */
function sanitize(string $dirty):string
{
    return filter_var(trim($dirty) ,FILTER_SANITIZE_SPECIAL_CHARS );
}

function auth()
{
    return \Framework\Session::has('user') ? \Framework\Session::get('user') : false;
}

/**
 *redirect to route function
 * @param string $value
 * @param array $data
 * @return void
 */
function redirect($value='',$data=[]):void
{
      extract($data) ;
     header('location:http://aparat-expert.local/'.$value);
}

/**
 *convert persian number to english
 * @param string $string
 * @return string
 *
 */
function convert($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);

    return str_replace($arabic, $num, $convertedPersianNums);
}

//persian_date to gorgian formatter

function toGeorgian($persianDate){
    //1402-10-06
    return Jalalian::fromFormat('Y-m-d' , convert($persianDate))->toCarbon()->format('Y-m-d');
}

function jalaliTimeAgo($created_at){
    return Jalalian::fromDateTime($created_at)->ago();
}

function array_fllaten($array){
    return array_reduce($array, function($arr, $element) {
        $arr[] = $element['id'];
        return $arr;
    });
}




function arrayDiff($array1 , $array2){
   return array_filter($array1, function ($element) use ($array2) {
        return !in_array($element, $array2);
    });
}











