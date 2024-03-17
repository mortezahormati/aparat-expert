<?php

namespace Framework\middleware;

use Framework\Session;

class CheckCover
{
    /**handle request for users
     * @param string $role
     * @return void
     */
    public function handle($role):void
    {
        if(Session::has('user') && $role==='checkCover'){

            if(empty(Session::get('user')['channel_cover_image']) ||  empty(Session::get('user')['chanel_name'])){
                Session::set('completeUserCover' ,'اطلاعات کاربری خود را از پنل تنظیمات تکمیل نمایید تا بتوانید بارگذاری انجام دهید . با تشکر');
                redirect('administrator');
            }
        }
    }
}