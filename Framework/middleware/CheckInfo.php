<?php

namespace Framework\middleware;

use Framework\Session;

class CheckInfo
{

    public function handle($role):void
    {
        if(Session::has('user') && $role==='checkInfo'){

            if(empty(Session::get('user')['phone_number']) ||  empty(Session::get('user')['chanel_name'])){
                Session::set('completeUserInfo' ,'اطلاعات کاربری خود را از پنل تنظیمات تکمیل نمایید');
            }
        }
    }
}