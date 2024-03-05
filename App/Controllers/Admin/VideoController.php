<?php

namespace App\Controllers\Admin;

use Framework\Database;

class VideoController
{



    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {

//        $sql = "select title,description,user_id,category_id,revision_count,like_count, from video";
//        $videos = $this->db->query($sql)->fetchAll() ?? null;
//        adminView('videos', [
//            'videos' => $videos ?? '',
//        ]);

        adminView('videos');
    }

    public function create()
    {

        adminView('videosAdd');

    }
//    public function store()
//    {
//
//                if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
//            $sql = "insert into video ( title,description,user_id,category_id,revision_count,like_count,confirm_show,confirm_comment,video_path,video_image,confirm_at,created_at,updated_at )
//                    values ( :title,:description,:user_id,:category_id,:revision_count,:like_count,:confirm_show,:confirm_comment,:video_path,:video_image,:confirm_at,:created_at,:updated_at)";
//            $params = [
//                'title'=>$_POST['title'],
//                'description'=> $_POST['description'] ,
//                'user_id'=> $_POST['user_id'],
//                'category_id'=> $_POST['category_id'],
//                'revision_count'=> $_POST['revision_count'],
//                'like_count'=> $_POST['like_count'],
//                'confirm_show'=> $_POST['confirm_show'],
//                'confirm_comment'=> $_POST['confirm_comment'],
//                'video_path'=> $_POST['video_path'],
//                'video_image'=> $_POST['video_image'],
//                'confirm_at'=> $_POST['confirm_at'],
//                'created_at'=> $_POST['created_at'],
//                'updated_at'=> $_POST['updated_at'],
//            ];
//            $this->db->query($sql, $params);
//
//            echo json_encode('inserted in database !!!');
//            return;
//    }
}