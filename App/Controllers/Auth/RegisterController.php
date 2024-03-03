<?php


namespace App\Controllers\Auth;

use Framework\Database;

class RegisterController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function register()
    {
        adminView('register');
    }
}