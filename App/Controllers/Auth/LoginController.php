<?php

namespace App\Controllers\Auth;

use Framework\Database;

class LoginController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function login()
    {
        adminView('login');
    }
}
