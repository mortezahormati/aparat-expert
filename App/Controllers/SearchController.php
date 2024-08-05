<?php

namespace App\Controllers;

use Framework\Elequent;

class SearchController
{


    protected $db;
    public function __construct()
    {
        $this->db = new Elequent();
    }
    public function search()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') ===
            'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $keyword = trim($_GET['search_name']);
            $users= $this->db->capsule::table('users')->select('id' , 'nick_name' , 'chanel_name','avatar_image')->where('name' , 'LIKE' , '%'.$keyword.'%')
                    ->orWhere('family' , 'LIKE' , '%'.$keyword.'%')
                    ->orWhere('chanel_name' , 'LIKE' , '%'.$keyword.'%')
                    ->orWhere('nick_name' , 'LIKE' , '%'.$keyword.'%')->get();

            $videos = $this->db->capsule::table('video')->select('id' ,'title', 'video_image','user_id')->where('title' , 'LIKE' , '%'.$keyword.'%')
                ->orWhere('description' , 'LIKE' , '%'.$keyword.'%')
                ->get();

            echo json_encode([
                'users' => !empty($users) ? $users :null,
                'videos' => !empty($videos) ? $videos :null,
            ]);

        }

    }
}