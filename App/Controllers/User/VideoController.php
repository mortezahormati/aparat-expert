<?php

namespace App\Controllers\User;

use Framework\Database;
use Framework\Session;
use Framework\Validation;
use Morilog\Jalali\Jalalian;

class VideoController
{
    protected $db;
    protected $user;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->user = auth();

    }

    public function create()
    {
        $sql = "select * from category";
        $sql2 = "select * from tags";
        $categories = $this->db->query($sql)->fetchAll();
        $tags = $this->db->query($sql2)->fetchAll();


        loadView('videosAdd', [
            'tags' => $tags,
            'categories' => $categories,
        ]);
    }

    private function uploadingFiles($file, $dir ,$allowedExtensions)
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

    private function insertVideostable($newListData ,$table_name )
    {
        $values = [];
        foreach ($newListData as $field => $value) {
            $fields[] = $field;
            //convert empty values to null
            if ($value === '') {
                $newListData[$field] = null;
            }
            $values[] = ':' . $field;
        }
        $fields = implode(', ', $fields);
        $values = implode(', ', $values);
        $sql3 = "insert into {$table_name} ({$fields}) values ({$values})";
        $this->db->query($sql3, $newListData);
    }

    private function insertTagVideoTable($tags ,$table_name)
    {
        if(!empty($_POST['tags'])){
            $video_id = $this->db->conn->lastInsertId();
            $tags = $_POST['tags'];

            foreach ($tags as $tag ){
                $sql5 = "Insert Into $table_name (tag_id ,video_id) VALUES (:tag_id , :video_id )";
                $this->db->query($sql5 , [
                    'tag_id' => $tag,
                    'video_id' => $video_id
                ]);
            }
        }
    }


    public function store()
    {
//        inspect($_POST);



//        dd($_FILES);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {


            //1- allowed-fields
            $allowedFields = ['title', 'description', 'user_id',
                'category_id', 'confirm_comment', 'video_path',
                'video_image', 'confirm_at'
            ];
            $newListData = array_intersect_key($_POST, array_flip($allowedFields));
            $newListData['user_id'] = $this->user['id'] ?? null;

            //2- sanitize-form
            $newListData = array_map('sanitize', $newListData);
//            $newListData['tags'] = $_POST['tags'] ?? null;
            $errors = [];
            //3- uploading files in server
            if (!empty($_FILES)) {
                if (!empty($_FILES['video_image']) && $_FILES['video_image']['error'] === UPLOAD_ERR_OK) {
                    $avatarImage = $_FILES['video_image'];
                    $upload = 'users-video' . DIRECTORY_SEPARATOR;
                    $uploadingFile = $this->uploadingFiles($avatarImage, $upload,['jpg', 'png', 'jpeg']);
                    if($uploadingFile === null){
                         $errors['video_image'] = ' فایل مورد نظر برای ویدیو مناسب نیست ';
                    }else{
                        $newListData['video_image'] = $upload .$uploadingFile ;

                    }
                }
                if (!empty($_FILES['video_path']) && $_FILES['video_path']['error'] === UPLOAD_ERR_OK) {
                    $channelCoverImage = $_FILES['video_path'];
                    $upload = 'users-poster-video' . DIRECTORY_SEPARATOR;
                    $uploadingFile = $this->uploadingFiles($channelCoverImage, $upload,['mp4' , 'flv']);
                    if($uploadingFile === null){
                         $errors['video_path'] = ' فایل مورد نظر مناسب نیست ';
                    }else{
                        $newListData['video_path'] = $upload . $uploadingFile;
                    }

                }
            }
            //4- required--- validation
            $requiredFields = [
                'title', 'description',
                'category_id', 'confirm_comment','confirm_at'
            ];


            foreach ($requiredFields as $filed) {
                if (empty($newListData[$filed]) || !Validation::stringSize($newListData[$filed])) {
                    $errors[$filed] = ucfirst($filed) . ' الزامی میباشد';
                }
            }
            //check user_id exists
            if (is_null($this->user)) {
                $errors['user_id'] = 'کاربر بارگذار ویدیو مشخص نیست';
            }
            if (!empty($errors)) {
                //reload view with errors
                $sql = "select * from category";
                $sql2 = "select * from tags";
                $categories = $this->db->query($sql)->fetchAll();
                $tags = $this->db->query($sql2)->fetchAll();
                loadView('videosAdd', [
                    'errors' => $errors,
                    'old_variable' => $newListData,
                    'tags' => $tags,
                    'categories' => $categories,
                ]);

            } else {
                //5- submit
                $newListData['created_at'] = date('Y-m-d');
                $newListData['confirm_at'] = toGeorgian($_POST['confirm_at']);
                //add video
                $this->insertVideostable($newListData,'video');
                //add_video_tag
                $this->insertTagVideoTable($_POST['tags'] , 'tag_video');


                Session::set('VideoUploadedSuccessfully' , 'ویدیوی شما با موفقیت بارگذاری شد.');
                redirect("administrator");
            }

        }

    }
}