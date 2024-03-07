<?php

namespace App\Controllers\User;

use Framework\Database;

class VideoController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function create()
    {
        loadView('videosAdd');
    }
}