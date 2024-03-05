<?php

namespace App\Controllers\Admin;

use Framework\Database;

class UserController
{

    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {

        $sql = "select id,name,family,created_at,role,nick_name,email from users";
        $users = $this->db->query($sql)->fetchAll();
        adminView('users', [
            'users' => $users,
        ]);
    }

    public function create()
    {

         adminView('usersAdd');

    }

    public function store()
    {
        inspect($_POST);
        dd($_FILES);
//        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
//            $sql = "insert into users ( nick_name,name,family,email,phone_number,chanel_name,password,channel_description,web_url,telegram_address,facebook_address,avatar_image,channel_cover_image,role,created_at,updated_at )
//                    values (:nick_name,:name,:family,:email,:phone_number,:chanel_name,:password,:channel_description,:web_url,:telegram_address,:facebook_address,:avatar_image,:channel_cover_image,:role,:created_at,:updated_at)";
//            $params = [
//                'nick_name'=>$_POST['nick_name'],
//                'name'=> $_POST['name'] ,
//                'family'=> $_POST['family'],
//                'email'=> $_POST['email'],
//                'phone_number'=> $_POST['phone_number'],
//                'chanel_name'=> $_POST['chanel_name'],
//                'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
//                'channel_description'=> $_POST['channel_description'],
//                'web_url'=> $_POST['web_url'],
//                'telegram_address'=> $_POST['telegram_address'],
//                'facebook_address'=> $_POST['facebook_address'],
//                'avatar_image'=> $_POST['avatar_image'],
//                'channel_cover_image'=> $_POST['channel_cover_image'],
//                'role'=> 'user',
//                'created_at'=> $_POST['created_at'],
//                'updated_at'=> $_POST['updated_at'],
//            ];
//            $this->db->query($sql, $params);
//
//            echo json_encode('inserted in database !!!');
//            return;

    }

}