<?php

namespace App\Controllers\User;

use Framework\Database;

class UserController
{

    protected $db;
    protected $user;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->user = auth();

    }

    public function show()
    {

        adminView('userSetting' , [
            'user' => $this->user
        ]);
    }

    public function update()
    {
        inspect($_FILES);
        dd($_POST);
    }
}