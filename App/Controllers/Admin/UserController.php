<?php

namespace App\Controllers\Admin;


use Framework\Database;
use Framework\Validation;

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

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {

            //1- allowed-fields
            $allowedFields = [
                'nick_name', 'name', 'family', 'email', 'phone_number', 'chanel_name', 'password',
                'channel_description', 'web_url', 'telegram_address', 'facebook_address',
                'avatar_image', 'channel_cover_image', 'role'
            ];
            $newListData = array_intersect_key($_POST,array_flip($allowedFields));
            //2- sanitize-form
            $newListData = array_map('sanitize' , $newListData);
            //3- uploading files in server
            if (!empty($_FILES)) {
                if (!empty($_FILES['avatar_image']) && $_FILES['avatar_image']['error'] === UPLOAD_ERR_OK) {
                    $avatarImage = $_FILES['avatar_image'];
                    $upload = 'users-image' . DIRECTORY_SEPARATOR;
                    $newListData['avatar_image'] = 'users-image/'.$this->uploadingFiles($avatarImage, $upload);
                }
                if (!empty($_FILES['channel_cover_image']) && $_FILES['channel_cover_image']['error'] === UPLOAD_ERR_OK) {
                    $channelCoverImage = $_FILES['channel_cover_image'];
                    $upload = 'users-channel-image-cover' . DIRECTORY_SEPARATOR;
                    $newListData['channel_cover_image'] = 'users-channel-image-cover/'.$this->uploadingFiles($channelCoverImage, $upload);
                }
            }
            //4- required--- validation
            $requiredFields = ['nick_name', 'name', 'family', 'email', 'phone_number', 'chanel_name', 'password', 'channel_cover_image'];
            $errors = [];
            foreach ($requiredFields as $filed){
                if(empty($newListData[$filed]) || !Validation::stringSize($newListData[$filed])){
                    $errors[$filed] = ucfirst($filed). ' الزامی میباشد';
                }
            }
            if(!empty($errors)){
                //reload view with errors
                 adminView('usersAdd' , [
                     'errors' => $errors,
                    'old_variable' => $newListData
                 ]);

            }else{
                //5- submit
                $newListData['created_at'] = date('Y-m-d');
                $newListData['password'] =  password_hash($_POST['password'], PASSWORD_DEFAULT);
                $newListData['role'] = $newListData['role']=== "on" ? 'admin' : 'user';
                //add user
                $values = [];
                foreach ($newListData as $field => $value){
                    $fields[] = $field;
                    //convert empty values to null
                    if($value === ''){
                        $newListData[$field] = null;

                    }
                    $values[] = ':'.$field;
                }
                $fields = implode(', ' , $fields);
                $values = implode(', ' , $values);
                $sql = "insert into users ({$fields}) values ({$values})";
                $this->db->query($sql ,$newListData );
                redirect("administrator/users");
                exit();
            }

        }
    }

    public function destroy($params)
    {

        if( $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) && isset($_POST['_method']) && !empty(isset($_POST['_method']))){
            $sql = "delete from users where id=:id";
            $p = [
                'id' => $params['id']
            ];
            $this->db->query($sql, $p);
            $_SESSION['user_deleted_successfully'] = 'کاربر مورد نظر با موفقیت حذف شد.';
            redirect("administrator/users");
            exit();
        }else{
            $_SESSION['user_deleted_no_successfully'] = 'حذف کاربر مورد نظر با شکست مواجه شد.';
            redirect("administrator/users");
            exit();
        }
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