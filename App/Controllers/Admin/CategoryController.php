<?php

namespace App\Controllers\Admin;

use Framework\Database;

class CategoryController
{

    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function index(){
        $sql= "select * from category";
        $categories = $this->db->query($sql)->fetchAll();
        adminView('categories',[
            'categories' => $categories ,
        ]);
    }

}