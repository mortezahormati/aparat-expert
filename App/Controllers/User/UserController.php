<?php

namespace App\Controllers\User;

use Framework\Database;
use Framework\Session;
use Framework\Validation;

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

    private function getUser()
    {
        $sql = "select * from users where id=:id ";
        return $this->db->query($sql, ['id' => $this->user['id']])->fetch();
    }

    public function show()
    {

        adminView('userSetting', [
            'user' => $this->getUser()
        ]);
    }

    private function uploadingFiles($file, $dir, $allowedExtensions)
    {
//        $upload = 'users-image'.DIRECTORY_SEPARATOR;
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $imageName = uniqid() . '--' . $file['name'];


        $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));


        if (in_array($fileExtension, $allowedExtensions) && move_uploaded_file($file['tmp_name'], $dir . $imageName)) {
            //4- upload file
            return $imageName;
        }
        return null;
    }

    protected function ValidateChannelNameUnique($chanel_name)
    {
        $sql = 'select chanel_name from users where chanel_name=:chanel_name';
        $p = str_replace(' ', '-', $chanel_name);

        return $this->db->query($sql, [
            'chanel_name' => $p
        ])->fetch();
    }

    protected function reduceByFollowersID($array)
    {
        return array_reduce($array, function ($arr, $element) {
            $arr[] = $element['follower_id'];
            return $arr;
        });
    }

    public function follows()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $follower_id = $_POST['id'];

            $user_id = $this->getUser()['id'];
            $sql2 = "select * from followers where user_id=:user_id";
            $user_followers = $this->db->query($sql2, [
                'user_id' => $user_id
            ])->fetchAll();
            if (count($user_followers) >0) {
                $user_followers_id = $this->reduceByFollowersID($user_followers);
                if (in_array($follower_id, $user_followers_id)) {

                    $data = ['process' => 'existed'];
                    echo json_encode($data);
                    return;
                }
            }

            if ($user_id) {
                $sql = "insert into followers (user_id,follower_id) values (:user_id, :follower_id)";
                $this->db->query($sql, [
                    'user_id' => $user_id,
                    'follower_id' => $follower_id,
                ]);

                $data = ['process' => 'true'];
                echo json_encode($data);
                return;
            } else {
                $data = ['process' => false];
                echo json_encode($data);
                return ;
            }
        }
    }

    public function unfollows()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $follower_id = $_POST['id'];
            $user = auth();

            $sql ="delete from followers where user_id=:user_id and follower_id=:follower_id";

            $record = $this->db->query($sql , [
                'user_id' => $user['id'] ,
                'follower_id' => $follower_id
            ]);
            $data = ['data' => 'true'];
            echo json_encode($data);
        }
    }


    public function update($params)
    {
        //allowed_field
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $allowed_field = [
                'chanel_name', 'telegram_address', 'facebook_address', 'phone_number', 'password', 'web_url'
                , 'channel_description'
            ];
            $newUserInfoData = array_intersect_key($_POST, array_flip($allowed_field));
            $newUserInfoData = array_map('sanitize', $newUserInfoData);
            //- uploading files in server
            //  1- validate data
            $errors = [];
            if (!empty($_FILES)) {
                if (!empty($_FILES['avatar_image']) && $_FILES['avatar_image']['error'] === UPLOAD_ERR_OK) {
                    $avatarImage = $_FILES['avatar_image'];
                    $upload = 'users-image/';
                    $uploadingFile = $this->uploadingFiles($avatarImage, $upload, ['jpg', 'png']);
                    if ($uploadingFile === null) {
                        $errors['avatar_image'] = ' فایل مورد نظر مناسب نیست ';
                    } else {
                        $newUserInfoData['avatar_image'] = $upload . $uploadingFile;
                    }
                }
                if (!empty($_FILES['channel_cover_image']) && $_FILES['channel_cover_image']['error'] === UPLOAD_ERR_OK) {
                    $channelCoverImage = $_FILES['channel_cover_image'];
                    $upload = 'users-channel-image-cover/';
                    $uploadingFile = $this->uploadingFiles($channelCoverImage, $upload, ['jpg', 'png']);
                    if ($uploadingFile === null) {
                        $errors['channel_cover_image'] = ' فایل مورد نظر مناسب نیست ';
                    } else {
                        $newUserInfoData['channel_cover_image'] = $upload . $uploadingFile;
                    }
                }
            }

            if (!Validation::stringSize($newUserInfoData['phone_number'], 10) || !Validation::numeric($newUserInfoData['phone_number'])) {
                $errors['phone_number'] = 'شماره همرراه را صحیح وارد نمایید';
            }
            if (isset($newUserInfoData['channel_cover_image']) && !Validation::stringSize($newUserInfoData['channel_cover_image'], 4)) {
                $errors['channel_cover_image'] = 'لطفا برای کانال خود کاور ایجاد کنید';
            }
            if (!Validation::stringSize($newUserInfoData['chanel_name'] ?? '', 3) || !Validation::englishAlphabet($newUserInfoData['chanel_name'])) {
                $errors['chanel_name'] = 'لطفا برای کانال خود نامی لاتین انتخاب کنید';
            }
            if (!empty($this->ValidateChannelNameUnique($newUserInfoData['chanel_name']))) {

                $errors['chanel_name_exists'] = 'این نام برای کانال دیگری استفاده شده است .';
            }

            if (!empty($errors)) {
                adminView('userSetting', [
                    'errors' => $errors,
                    'user' => $this->user
                ]);
            } else {
                //submit
                $fields = [];
                $newUserInfoData['updated_at'] = date('Y-m-d');
                $newUserInfoData['id'] = $this->user['id'];
                $newUserInfoData['password'] = $this->user['password'];
                $newUserInfoData['chanel_name'] = str_replace(' ', '-', $newUserInfoData['chanel_name']);

                foreach ($newUserInfoData as $field => $value) {
                    $fields[] = $field . '=:' . $field;
                }
                $fields = implode(', ', $fields);
                $sql = "UPDATE USERS SET {$fields} Where id=:id";
                $this->db->query($sql, $newUserInfoData);
                Session::clear('user');
                $user = $this->getUser();
                Session::set('user', $user);
                Session::set('userCompleteInfoSuccessfully', 'اطلاعات شما با موفقیت بارگذاری شد.');
                redirect("administrator");
                exit();
            }

        }
    }
}