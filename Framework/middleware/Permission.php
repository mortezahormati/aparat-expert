<?php

namespace Framework\middleware;

use Framework\Session;

class Permission
{

    //user authenticated


    /**handle request for users
     * @param string $role
     * @return void
     */
    public function handle(string $role):void{

        if(Session::has('user')){
            $user_role = Session::get('user')['role'];
            if($role==='admin' &&  $user_role==='user'){
                Session::set('ypuHaveNotPermission' , 'شما اجازه دسترسی به این صفحه را ندارید.');
                redirect('administrator');
            }
        }
    }
}