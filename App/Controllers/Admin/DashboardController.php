<?php

namespace App\Controllers\Admin;
use Framework\Database;

class DashboardController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index(){
        adminView('home');
    }
}