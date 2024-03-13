<?php

namespace Framework\middleware;

use Framework\Session;

class Authorize
{

    public function isAthenticated()
    {
        return Session::has('user');
    }

    public function handle($role)
    {
        if ($role === 'guest' && $this->isAthenticated()) {
            return redirect('');
        }elseif($role === 'auth' && !$this->isAthenticated()) {
            return redirect('login');
        }
    }
}