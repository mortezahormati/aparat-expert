<?php

namespace App\Controllers\Error;

class ErrorController
{

    public static function notFind($message="آدرس مورد نظر شما یافت نشد! ")
    {
        http_response_code(404);
        loadView('404',[
            'message' => $message ,
            'status' => '404'
        ]);
    }


    public static function notAcceess($message="شما دسترسی به آدرس مورد نطر ندارید ")
    {
        http_response_code(404);

        loadView('404',[
            'message' => $message ,
            'status' => '403'
        ]);
    }
}