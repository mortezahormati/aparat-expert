<?php

namespace Framework\middleware;

use Framework\Session;

class Authorize
{

    /**is client login
     * @return bool
     */
    public function isAuthenticated():bool
    {
        return Session::has('user');
    }

    /**handle request for users
     * @param string $role
     * @return void
     */
    public function handle(string $role):void
    {
        
        if ($role === 'guest' && $this->isAuthenticated()) {
             redirect('');
        } elseif ($role === 'auth' && !$this->isAuthenticated()) {
             redirect('login');
        }
    }


}