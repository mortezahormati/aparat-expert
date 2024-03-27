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
        $sql2 = "SELECT id,title,created_at,revision_count,like_count,confirm_at,video_path,video_image FROM video";
        $all_videos = $this->db->query($sql2)->fetchAll();


        adminView('videos' , [
            'all_videos' => $all_videos
        ]);
    }

    public function userIndex()
    {
        $user = auth();
        $sql = "SELECT id,title,created_at,revision_count,
       like_count,confirm_at,
       video_path,video_image FROM video where user_id=:user_id";
        $all_videos = $this->db->query($sql,[
           'user_id' => $user['id']
        ])->fetchAll();
        adminView('videos' , [
            'all_videos' => $all_videos
        ]);
    }



}