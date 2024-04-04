<?php

namespace App\Controllers\Admin;

use Framework\Database;

class FollowerController
{

    protected $db;
    protected $user;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->user = auth();

    }

    public function index()
    {



        //followers
        $sql = "select * from followers where follower_id=:user_id";
        $followers =$this->db->query($sql , [
            'user_id' => $this->user['id']
        ])->fetchAll();

        if(count($followers) > 0){
            $followers_info = [];
            foreach ($followers as $follower){
                $sql2 = "select nick_name,id,chanel_name,telegram_address,facebook_address,avatar_image,channel_cover_image from users where id=:follower_id";
                $followers_info[] = $this->db->query($sql2 , [
                    'follower_id' => $follower['user_id']
                ])->fetch();
            }
        }
        //follows
        $sql3 = "select * from followers where user_id=:user_id";
        $follows =$this->db->query($sql3 , [
            'user_id' => $this->user['id']
        ])->fetchAll();
        if(count($follows) > 0){
            $follows_info = [];
            foreach ($follows as $follow){
                $sql2 = "select nick_name,id,chanel_name,telegram_address,facebook_address,avatar_image,channel_cover_image from users where id=:follower_id";
                $follows_info[] = $this->db->query($sql2 , [
                    'follower_id' => $follow['follower_id']
                ])->fetch();
            }
        }
        adminView('followers' , [
            'followers_info' => $followers_info ?? null,
            'follows_info' => $follows_info ?? null
        ]);
    }
}