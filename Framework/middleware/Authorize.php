<?php

namespace Framework\middleware;

use Framework\Session;

class Authorize
{

    /**check user is authneticate
     ** @return bool
     */
    public function isAthenticate():bool
    {
        return  Session::has('user');
    }
    public function handle($role)
    {
        if($role==='user' && $this->isAthenticate()){

            redirect('');
        }elseif ($role===)
    }

}