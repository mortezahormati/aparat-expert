<?php

namespace App\Controllers\Admin;


use Framework\Database;
use Framework\Validation;

class UserController
{

    protected $db;
    public $base_redirect_url = 'location:http://aparat-expert.local/';

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

    private function uploadingFiles($image, $dir)
    {
//        $upload = 'users-image'.DIRECTORY_SEPARATOR;
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $imageName = uniqid() . '--' . $image['name'];

        move_uploaded_file($image['tmp_name'], $dir . $imageName);
        return $imageName;
    }

    private function redirect($name)
    {
        header($this->base_redirect_url . $name);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {

            //1- allowed-fields
            $allowedFields = [
                'nick_name',
                'name',
                'family',
                'email',
                'phone_number',
                'chanel_name',
                'password',
                'channel_description',
                'web_url',
                'telegram_address',
                'facebook_address',
                'avatar_image',
                'channel_cover_image',
                'role'
            ];


            $newListData = array_intersect_key($_POST,array_flip($allowedFields));
            $newListFile = array_intersect_key($_FILES,array_flip($allowedFields));





            //2- sanitize-form
            $newListData = array_map('sanitize' , $newListData);

            //3- new list
            $newListData = array_merge($newListData , $newListFile);




            //4- required--- validation
            //5- submit



            ///1validate $_Post

            if (!empty($_FILES)) {
                if (!empty($_FILES['avatar_image']) && $_FILES['avatar_image']['error'] === UPLOAD_ERR_OK) {
                    $avatarImage = $_FILES['avatar_image'];
                    $upload = 'users-image' . DIRECTORY_SEPARATOR;
                    $avatarImageName = $this->uploadingFiles($avatarImage, $upload);
                }
                if (!empty($_FILES['channel_cover_image']) && $_FILES['channel_cover_image']['error'] === UPLOAD_ERR_OK) {
                    $channelCoverImage = $_FILES['channel_cover_image'];
                    $upload = 'users-channel-image-cover' . DIRECTORY_SEPARATOR;
                    $channelCoverImageName = $this->uploadingFiles($channelCoverImage, $upload);

                }
            }
            //add user


            $sql = "insert into users ( nick_name,name,family,email,phone_number,chanel_name,password,channel_description,web_url,telegram_address,facebook_address,avatar_image,channel_cover_image,role,created_at,updated_at )
                    values (:nick_name,:name,:family,:email,:phone_number,:chanel_name,:password,:channel_description,:web_url,:telegram_address,:facebook_address,:avatar_image,:channel_cover_image,:role,:created_at,:updated_at)";
            $params = [
                'nick_name' => $_POST['nick_name'],
                'name' => $_POST['name'],
                'family' => $_POST['family'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number'],
                'chanel_name' => $_POST['chanel_name'] ?? null,
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'channel_description' => $_POST['channel_description'] ?? null,
                'web_url' => $_POST['web_url'] ?? null,
                'telegram_address' => $_POST['telegram_address'] ?? null,
                'facebook_address' => $_POST['facebook_address' ?? null],
                'avatar_image' => $avatarImageName ? 'users-image/' . $avatarImageName : null,
                'channel_cover_image' => $channelCoverImageName ? 'users-channel-image-cover/' . $channelCoverImageName : null,
                'role' => $_POST['role'] === "on" ? 'admin' : 'user',
                'created_at' => date('Y-m-d'),
                'updated_at' => null,
            ];
            $this->db->query($sql, $params);

            $this->redirect("administrator/users");

        }
    }


    public function show($params)
    {
        $sql = "select * from users where id=:id";
        $p = [
            'id' => $params['id']
        ];
        $user = $this->db->query($sql, $p)->fetch();

        adminView('user', [
            'user' => $user
        ]);
    }

    public function update($params)
    {
        inspect($_POST);
        dd($_FILES);
        $sql = "UPDATE users SET nick_name=:nick_name,name = :name,family=:family,email=:email,
                 phone_number=:phone_number,chanel_name=:chanel_name,password=:password,
                 channel_description=:channel_description,web_url=:web_url,telegram_address=:telegram_address,
                 facebook_address=:facebook_address,avatar_image=:avatar_image,channel_cover_image=:channel_cover_image,
                 role=:role,created_at=:created_at,updated_at=:updated_at WHERE id=:id";
    }

}