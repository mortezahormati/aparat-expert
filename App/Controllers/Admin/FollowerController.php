<?php

namespace App\Controllers\Admin;

use Framework\Database;

class FollowerController
{

    protected $db;
    protected $user;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->user = auth();

    }

    public function index()
    {
        adminView('followers');
    }
}