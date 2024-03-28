<?php

namespace App\Controllers;
use Carbon\Carbon;
use Framework\Database;
use Framework\Session;

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
            'videos' => $videos,
            'categories' => $categories
        ]);
    }

    public function channel($params)
    {

        $sql = "select * from users where chanel_name=:channel_name";
        $user = $this->db->query($sql,[
            'channel_name' => $params['channel_name']
        ])->fetch();
        $videos=[];
        if($user){
            $sql = "select * from video where user_id=:user_id order by  created_at desc";
            $videos = $this->db->query($sql,[
                'user_id' => $user['id']
            ])->fetchAll();

            $last_video = (array_slice($videos,'0',1)[0]);


            $old_videos = array_slice($videos,1,count($videos));

            loadView('channel' , [
                'user' => $user ,
                'videos' => $videos,
                'last_video' =>$last_video,
                'old_videos' =>$old_videos
            ]);
        }else{
            redirect('404');
        }
    }

    public function categoryVideos($params)
    {
        $sql = "select * from video where category_id=:category_id ";
        $sql2 = "select * from category where id=:id ";
        $sql3 ="select * from category";
        $videos = $this->db->query($sql , [
           'category_id' => $params['id']
        ])->fetchAll();
        $selected_category = $this->db->query($sql2 , [
            'id' => $params['id']
        ])->fetch();

        $selected_category['avatar_image'] = 'category/avatar/'.$selected_category['name'].'.png';
        $selected_category['cover_image'] = 'category/cover/'.$selected_category['name'].'.png';
        loadView('category' ,[
            'videos' => $videos,
            'selected_category' => $selected_category
        ]);



    }
}