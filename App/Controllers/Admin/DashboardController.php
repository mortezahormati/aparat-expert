<?php

namespace App\Controllers\Admin;
use Framework\Database;

class DashboardController
{
    protected $db;
    protected $user;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->user = auth();

    }


    public function index(){

        //get users video
        if(!is_null($this->user)){
            $sql1 = "SELECT COUNT(*) FROM video WHERE user_id = :user_id";
            $sql2 = "SELECT title,created_at,revision_count,like_count,confirm_at,video_path,video_image FROM video WHERE user_id = :user_id";
            $user_videos = $this->db->query($sql2 , ['user_id' => $this->user['id']])->fetchAll();
            $user_videos_count = $this->db->query($sql1 , ['user_id' => $this->user['id']])->fetch();
        }

        //get user comments


        adminView('home' ,[
            'user_videos' => $user_videos ?? null,
            'user_videos_count' =>$user_videos_count ?? null
        ]);
    }
}