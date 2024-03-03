<?php

namespace App\Controllers\Error;

class ErrorController
{

    public function notFind()
    {
        loadView('404');
    }
}