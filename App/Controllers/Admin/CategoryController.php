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

    public function index()
    {
        $sql = "select * from category";
        $categories = $this->db->query($sql)->fetchAll();
        adminView('categories', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest') {


            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $sql = "SELECT id,persian_name from category";
                $data = $this->db->query($sql)->fetchAll();
                echo json_encode($data);
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $sql = "insert into category (name , persian_name , parent_id ,created_at) values (:name , :persian_name , :parent_id , :created_at)";
                $params = [
                    'name' => $_POST['name'],
                    'persian_name' => $_POST['persian_name'],
                    'parent_id' => $_POST['parent_id'] ,
                    'created_at' => date('Y-m-d'),
                ];

                $this->db->query($sql, $params);

                echo json_encode('inserted in database !!!');
                return;
            }


        }
        echo "این یک درخواست ایجکس نیست";

    }


    public function update()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest') {

            if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
                $sql = "select * from category where id=:id";
                $sql2 = "select * from category where id!=:id ";
                $sql3 = "select id,persian_name from category where id=:parent_id";
                $params = [
                    'id' => $_GET['id']
                ];
                $sta['self'] = $this->db->query($sql, $params)->fetch();
                if ($sta['self']['parent_id'] !== null) {
                    $par = [
                        'parent_id' => $sta['self']['parent_id']
                    ];
                    $sta['parent'] = $this->db->query($sql3, $par)->fetch();
                }
                $sta2['all'] = $this->db->query($sql2, $params)->fetchAll();
                $stats = array_merge($sta, $sta2);
                echo json_encode($stats);
                return;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
                $sql = "update  category set name=:name , persian_name=:persian_name , parent_id=:parent_id  where id=:id";
                $params = [
                    'name' => $_POST['name'],
                    'persian_name' => $_POST['persian_name'],
                    'parent_id' => $_POST['parent_id'] == 0 ? null : $_POST['parent_id'],
                    'id' => $_POST['cat_id'],
                ];

                $this->db->query($sql, $params);
                echo json_encode('updated finish in database !!!');
                return;
            }

        }


    }

    public function delete()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql = "Delete from category where id=:id";
            $params = [
                'id' => $_POST['id'],
            ];
            $this->db->query($sql, $params);
            echo json_encode('deleted is success !!!');
        }

    }


}