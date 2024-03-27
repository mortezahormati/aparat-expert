<?php

namespace App\Controllers;
use Carbon\Carbon;
use Framework\Database;
class HomeController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function index()
    {
        $sql = "select id,persian_name from category";
        $categories = $this->db->query($sql)->fetchAll();
        $videos = [];
        foreach ($categories as $category){
            $sql = "select title,description,user_id,
                    category_id, confirm_comment ,video_path,
                    video_image, confirm_at,chanel_name,avatar_image,video.created_at,video.id
                    from video  INNER JOIN users ON video.user_id=users.id where category_id=:category_id";
            $videos[$category['persian_name']] =$this->db->query($sql , [
                'category_id' => $category['id']
            ])->fetchAll();
        }
        loadView('home' ,[
            'videos' => $videos
        ]);
    }

    public function channel($params)
    {
        dd($params);
        loadView('channel');
    }
}