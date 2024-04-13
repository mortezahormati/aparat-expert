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
        $sql2 = "SELECT id,title,created_at,revision_count,like_count,confirm_at,video_path,video_image 
                 FROM video ";

        $all_videos = $this->db->query($sql2)->fetchAll();
//
        if(count($all_videos) >0 ){
            foreach ($all_videos as $video){
                $sql3 ="select * from comments where video_id=:video_id";
                $ok = $this->db->query($sql3 , [
                    'video_id' => $video['id']
                ])->fetchAll();
                if(count($ok) > 0){

                    $video_has_comments[] = array_column($ok, 'video_id');
                }
            }
            $video_has_comment_ids = array_merge(...$video_has_comments);


        }

        adminView('videos' , [
            'all_videos' => $all_videos,
            'video_has_comment_ids' => $video_has_comment_ids ?? null
        ]);
    }

    protected function reduceByID($array){
        return array_reduce($array, function($arr, $element) {
            $arr[] = $element['id'];
            return $arr;
        });
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
      if(count($all_videos) >0 ){
          foreach ($all_videos as $video){
              $sql3 ="select * from comments where video_id=:video_id";
              $ok = $this->db->query($sql3 , [
                  'video_id' => $video['id']
              ])->fetchAll();
              if(count($ok) > 0){

                  $video_has_comments[] = array_column($ok, 'video_id');
              }
          }
          $video_has_comment_ids = array_merge(...$video_has_comments);


      }

        adminView('videos' , [
            'all_videos' => $all_videos,
            'video_has_comment_ids' => $video_has_comment_ids ?? null
        ]);
    }



}