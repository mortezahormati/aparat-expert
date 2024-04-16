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
            $sql1 = "SELECT COUNT(id) as count FROM video WHERE user_id = :user_id ";
            $sql2 = "SELECT id,title,created_at,revision_count,like_count,confirm_at,video_path,video_image FROM video WHERE user_id = :user_id Limit 4 ";
            $sql3= "SELECT SUM(revision_count) as revision_all FROM video WHERE user_id= :user_id";
            $sql4 = "select count(id) as followers from followers where follower_id=:user_id";

            $user_followers_count = $this->db->query($sql4,[
                'user_id' => $this->user['id']
            ])->fetch();

            $user_revision_count = $this->db->query($sql3 , [
               'user_id' => $this->user['id']
            ])->fetch();
            $user_videos = $this->db->query($sql2 , ['user_id' => $this->user['id']])->fetchAll();


            if(count($user_videos) > 0){
                foreach ($user_videos as $video){
                    $sql = "select text,chanel_name,nick_name,avatar_image,comments.video_id from comments
                        inner join users on comments.user_id=users.id
                        where video_id=:video_id 
                 ";
                    $cm = $this->db->query($sql , [
                        'video_id' => $video['id']
                    ])->fetchAll();
                    if(count($cm) > 0){
                        $comments[]=$cm;
                    }
                }
            }



            $user_videos_count = $this->db->query($sql1 , ['user_id' => $this->user['id']])->fetch();

        }


        //get user comments

//        dd($comments);

        adminView('home' ,[
            'user_videos' => $user_videos ?? null,
            'user_videos_count' =>$user_videos_count['count'] ?? null,
            'user_revision_count' => $user_revision_count['revision_all'] ?? null,
            'user_followers_count' => $user_followers_count['followers'] ?? null,
            'comments' => $comments ?? null,
        ]);
    }
}