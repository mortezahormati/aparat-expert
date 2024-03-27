<?php

namespace App\Controllers\Admin;


use Framework\Database;
use Framework\Session;
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

    protected function getUser($params){
        $sql = "select * from users where id=:id";
        $p = [
            'id' => $params['id']
        ];
        return  $this->db->query($sql, $p)->fetch();
    }
    public function show($params)
    {
        $user = $this->getUser($params);

        adminView('user', [
            'user' => $user
        ]);
    }



    public function destroy($params)
    {
        if( $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) && isset($_POST['_method']) && !empty(isset($_POST['_method']))){
            $sql = "delete from users where id=:id";
            $p = [
                'id' => $params['id']
            ];
            $this->db->query($sql, $p);
            Session::set('user_deleted_successfully' ,'کاربر مورد نظر با موفقیت حذف شد.') ;
            redirect("administrator/users");
            exit();
        }else{
            Session::set('user_deleted_no_successfully' , 'حذف کاربر مورد نظر با شکست مواجه شد.') ;
            redirect("administrator/users");
            exit();
        }
    }
    protected function ValidateChannelNameUnique($chanel_name){
        $sql ='select chanel_name from users where chanel_name=:chanel_name';
        $p = str_replace(' ','-',$chanel_name);

        return  $this->db->query($sql , [
            'chanel_name' => $p
        ])->fetch();

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
            if(!Validation::englishAlphabet($newListData['chanel_name'])){
                $errors['chanel_name'] = "نام کانال شما باید به صورت حروف لاتین باشد.";
            }
            if($this->ValidateChannelNameUnique($newListData['chanel_name'])){

                $errors['chanel_name'] = 'این نام برای کانال دیگری استفاده شده است .';
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
                $newListData['chanel_name'] = str_replace(' ','-' ,$newListData['chanel_name']);
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

    public function update($params)
    {
        $user = $this->getUser($params);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            //1- allowed-fields
            $allowedUpdateFields = [
                'nick_name', 'name', 'family', 'email', 'phone_number', 'chanel_name',
                'channel_description', 'web_url', 'telegram_address', 'facebook_address',
                'avatar_image', 'channel_cover_image', 'role'
            ];
            $newUserUpdateData = array_intersect_key($_POST,array_flip($allowedUpdateFields));

            //2- sanitize-form
            $newUserUpdateData = array_map('sanitize' , $newUserUpdateData);
            //3- uploading files in server
            if (!empty($_FILES)) {
                if (!empty($_FILES['avatar_image']) && $_FILES['avatar_image']['error'] === UPLOAD_ERR_OK) {
                    $avatarImage = $_FILES['avatar_image'];
                    $upload = 'users-image' . DIRECTORY_SEPARATOR;
                    $newUserUpdateData['avatar_image'] = 'users-image/'.$this->uploadingFiles($avatarImage, $upload);
                }else{
                    $newUserUpdateData['avatar_image'] =$user['avatar_image'];
                }
                if (!empty($_FILES['channel_cover_image']) && $_FILES['channel_cover_image']['error'] === UPLOAD_ERR_OK) {
                    $channelCoverImage = $_FILES['channel_cover_image'];
                    $upload = 'users-channel-image-cover' . DIRECTORY_SEPARATOR;
                    $newUserUpdateData['channel_cover_image'] = 'users-channel-image-cover/'.$this->uploadingFiles($channelCoverImage, $upload);
                }else{
                    $newUserUpdateData['channel_cover_image'] =$user['channel_cover_image'];
                }
            }
            //4- required--- validation
            $requiredUpdateFields = ['nick_name', 'name', 'family', 'email', 'phone_number', 'chanel_name'];
            $errors = [];
//            dd($_FILES);
            foreach ($requiredUpdateFields as $filed){
                if(empty($newUserUpdateData[$filed]) || !Validation::stringSize($newUserUpdateData[$filed])){
                    $errors[$filed] = ucfirst($filed). ' الزامی میباشد';
                }
            }
            if($this->ValidateChannelNameUnique($newUserUpdateData['chanel_name'])){
                $errors['chanel_name'] = 'این نام برای کانال دیگری استفاده شده است .';
            }


            if(!empty($errors)){
                //reload view with errors


                 adminView('user', [
                    'errors' => $errors,
                    'user' => $newUserUpdateData
                ]);

            }else {


                //5- submit
                $newUserUpdateData['updated_at'] = date('Y-m-d');
                $newUserUpdateData['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
                $newUserUpdateData['role'] = $newUserUpdateData['role'] === "on" ? 'admin' : 'user';
                $newUserUpdateData['id'] =$user['id'];
                $fields=[];
                foreach ($newUserUpdateData as $field => $value){
                    $fields[] = $field.'=:'.$field;
                    //convert empty values to null
                }
                $fields = implode(', ' , $fields);
                $sql = "UPDATE USERS SET {$fields} Where id=:id";
                $this->db->query($sql,$newUserUpdateData);
                Session::set('userUpdatedSuccessfully' , 'اطلاعات کاربر با موفقیت به روز رسانی شد.') ;
                redirect("administrator/users");
                exit();


            }
        }

    }




}