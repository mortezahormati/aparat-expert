<?php

namespace Framework\middleware;

use Framework\Session;

class CheckInfo
{
    /**handle request for users
     * @param string $role
     * @return void
     */
    public function handle(string $role):void{

        if(Session::has('user')){
            $userPhone = Session::get('user')['phone_number'];
            $userChanelName = Session::get('user')['chanel_name'];
            if($role==='checkInfo' &&  empty($userPhone) || empty('phone_number`')){
                Session::set('completeYourInfo' , 'اطلاعات کاربری خود را تکمیل نمایید! تا از امکانات کامل سایت بهرمند شوید. ( شماره همراه و نام کانال ...)');

            }
        }
    }
}