<?php

namespace App\Controllers\User;

use Framework\Database;

class VideoController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function create()
    {
        $sql="select * from category";
        $sql2 = "select * from tags";
        $categories = $this->db->query($sql)->fetchAll();
        $tags = $this->db->query($sql2)->fetchAll();




        loadView('videosAdd' ,  [
            'tags' => $tags ,
            'categories' => $categories ,
        ]);
    }

    private function uploadingFiles($file, $dir)
    {
//        $upload = 'users-image'.DIRECTORY_SEPARATOR;
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $imageName = uniqid() . '--' . $file['name'];

        move_uploaded_file($file['tmp_name'], $dir . $imageName);
        return $imageName;
    }
    public function store()
    {
//        inspect($_POST);
//        dd($_FILES);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {


            if (!empty($_FILES)) {
                if (!empty($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
                    $upload = 'users-video' . DIRECTORY_SEPARATOR;
                    $videoName = $this->uploadingFiles($_FILES['video'], $upload);
                }
                if (!empty($_FILES['video-poster']) && $_FILES['video-poster']['error'] === UPLOAD_ERR_OK) {
                    $upload = 'users-poster-video' . DIRECTORY_SEPARATOR;
                    $posterVideoName = $this->uploadingFiles($_FILES['video-poster'], $upload);
                }
            }

            $sql = "insert into video ( title,description,user_id,category_id,confirm_comments,video_path,video_image,created_at)
                    values (:title,:description,:user_id,:category_id,:confirm_comments,:video_path,:video_image,:created_at)";
            $params = [
                'title' => !empty($_POST['title']) ? $_POST['title'] : null,
                'description' => !empty($_POST['description']) ? $_POST['description'] : null,
                'user_id' => 1,
                'cateory_id' => !empty($_POST['category_id']) ? $_POST['category_id'] : null,
                'confirm_comments' => $_POST['confirm_comment'] ,
                'video_path' => $videoName,
                'video_image' => $posterVideoName ,
                'created_at' =>date('Y-m-d')
            ];
            $this->db->query($sql, $params);

            $this->redirect("/");
        }
    }
}