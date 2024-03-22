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
    protected $allowedFields = ['title', 'description', 'user_id',
        'category_id', 'confirm_comment', 'video_path',
        'video_image', 'confirm_at'
    ];

    protected $requiredFields = [
        'title', 'description',
        'category_id', 'confirm_comment','confirm_at'
    ];

    protected $uploadimageDir ='users-poster-video' . DIRECTORY_SEPARATOR;
    protected $uploadVideoDir ='users-video' . DIRECTORY_SEPARATOR;

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

    private function setListData($allowedFields , $data){
        $newListData = array_intersect_key($data, array_flip($allowedFields));
        $newListData['user_id'] = $this->user['id'] ?? null;

        //2- sanitize-form
        return array_map('sanitize', $newListData);

    }

    private function uploadFilesPost($name ,$allowedExtension ,$fileDir){
        if (!empty($_FILES[$name]) && $_FILES[$name]['error'] === UPLOAD_ERR_OK) {
            $uploadingFile = $this->uploadingFiles($_FILES[$name],  $fileDir,$allowedExtension);

            if($uploadingFile === null){
                 return null;
            }
             return  $fileDir.$uploadingFile ;
        }else{
            return null;
        }

    }


    public function store()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {


            $newListData= $this->setListData($this->allowedFields , $_POST);

            $errors = [];

            //3- uploading files in server
            if (!empty($_FILES)) {

                $video_image_path = $this->uploadFilesPost('video_image' , ['jpg' , 'png'],$this->uploadimageDir);
                $video_path = $this->uploadFilesPost('video_path' , ['mp4' , 'flv'],$this->uploadVideoDir);
                !is_null($video_image_path) ?
                    $newListData['video_image'] = $video_image_path :
                    $errors['video_image'] ='این تصویر مناسب پوستر ویدیو نمیباشد .';
                !is_null($video_path) ?
                    $newListData['video_path'] = $video_path :
                    $errors['video_path'] ='این فایل ویدیو مناسب  نمیباشد .';

            }

            //4- required--- validation

            foreach ($this->requiredFields as $filed) {
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

//                dd($newListData);
                $this->insertVideostable($newListData,'video');
                //add_video_tag

                $this->insertTagVideoTable($_POST['tags'] , 'tag_video');


                Session::set('VideoUploadedSuccessfully' , 'ویدیوی شما با موفقیت بارگذاری شد.');
                redirect("administrator");
            }

        }

    }

    public function show($params)
    {
        $sql = "select * from video where id=:id";
        $sql2 = "select id,persian_name from category";
        $sql3 = "select id,persian_name from tags";
        $sql4 = "select tag_id as id from tag_video where video_id=:id";
        $sql5 = "select id,persian_name from category where id=:category_id";
        $video =$this->db->query($sql , [
            'id' => $params['id']
        ])->fetch();
        //tags
        $tags = $this->db->query($sql3)->fetchAll();
        //categories
        $categories = $this->db->query($sql2)->fetchAll();
        //fetch selected tags
        $selected_tags_id = $this->db->query($sql4 ,[
            'id' => $params['id']
        ])->fetchAll();
        $arr = array_fllaten($selected_tags_id);
        $selected_tags_ids = implode(',' , $arr);
        $sql6 = 'SELECT id,persian_name FROM tags WHERE id IN (' . $selected_tags_ids .')';
        $selected_tags = $this->db->query($sql6)->fetchAll();
        $noun_selected_tags = arrayDiff($tags , $selected_tags);
        adminView('videoEdit' ,[
            'video' => $video ,
            'categories' => $categories ,
            'selected_tags' => $selected_tags ,
            'noun_selected_tags' => $noun_selected_tags ,
        ]);
    }
}