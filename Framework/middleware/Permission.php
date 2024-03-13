<?php

namespace Framework\middleware;

use Framework\Session;

class Permission
{
//user authenticated

    public function handle($role)
    {

        if(Session::has('user')) {

            $user_role = Session::get('user')['role'];
            if ($user_role === 'user' && $role === 'admin') {
                Session::set('youHaveNotPermission' , 'شما اجازه دسترسی به این صفحه را ندارید');
                redirect('administrator');
            }
        }
    }
}