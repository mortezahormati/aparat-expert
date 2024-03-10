<?php

namespace App\Controllers\Admin;

use Framework\Database;

class TagController
{

    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $sql = "select * from tags";
        $tags = $this->db->query($sql)->fetchAll();
        adminView('tags', [
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest') {

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $sql = "SELECT id,persian_name from tags";
                $data = $this->db->query($sql)->fetchAll();

                echo json_encode($data);
                return;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                ///
                $sql = "insert into tags (name , persian_name) values (:name , :persian_name)";
                $params = [
                    'name' => $_POST['name'],
                    'persian_name' => $_POST['persian_name'],
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
                $sql = "select * from tags where id=:id";
                $params = [
                    'id' => $_GET['id']
                ];
                $sta = $this->db->query($sql, $params)->fetch();

                echo json_encode($sta);
                return;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {

                $sql = "update tags set name=:name,persian_name=:persian_name,updated_at=:updated_at where id=:id";
                $params = [
                    'name' => $_POST['name'],
                    'persian_name' => $_POST['persian_name'],
                    'updated_at' => date('Y-m-d'),
                    'id' => $_POST['tag_id'],
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
            $sql = "Delete from tags where id=:id";
            $params = [
                'id' => $_POST['id'],
            ];
            $this->db->query($sql, $params);
            echo json_encode('deleted is success !!!');
        }

    }


}