<?php

namespace App\Controllers\Admin;

use Carbon\Carbon;
use Framework\Database;
use Framework\Validation;
class CommentController
{
    protected $db;
    protected $user;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->user = auth();

    }

    public function index($params)
    {
        $video_id = $params['video_id'];

        $sql1 ="select * from video where id=:video_id and user_id=:user_id";
        $sql ="select text,nick_name,avatar_image,chanel_name,users.id,comments.id,comments.created_at,show_comments,like_count from comments inner join users on users.id=comments.user_id where video_id=:video_id";

        $video = $this->db->query($sql1 , [
           'video_id' => $video_id,
            'user_id' => $this->user['id']
        ])->fetch();


        if($video){
            $comments= $this->db->query($sql,[
                'video_id' => $video_id
            ])->fetchAll();
            if(count($comments) > 0 ) {
                adminView('comments', [
                    'video' => $video,
                    'comments' => $comments ?? null
                ]);
            }else{
                redirect('404');
            }
        }else{
            redirect('404');
        }
    }

    public function remove()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql="select * from comments where id=:comment_id";
            $cm = $this->db->query($sql,[
                'comment_id' => $_POST['id']
            ])->fetch();
            if(!empty($cm)){
                $sql2="Delete from comments where id=:id";
                $this->db->query($sql2,[
                    'id'=>$cm['id']
                ]);
                echo json_encode(['process' => 'success' ]);
                return;
            }else{
                echo json_encode(['process' => 'error' , 'error' => 'دیدگاهی یافت نشد !!']);
                return;
            }

        }else{
            echo json_encode(['process' => 'notAjax']);
            return;
        }
    }

    public function confirm()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $sql="select * from comments where id=:comment_id";
            $cm = $this->db->query($sql,[
                'comment_id' => $_POST['id']
            ])->fetch();
            if(!empty($cm)){
                $sql2="Update comments set show_comments=1 where id=:id";
                $this->db->query($sql2,[
                   'id'=>$cm['id']
                ]);
                echo json_encode(['process' => 'success' ]);
                return ;
            }else{
                echo json_encode(['process' => 'error' , 'error' => 'دیدگاهی یافت نشد !!']);
                return;
            }

        }else{
            echo json_encode(['process' => 'notAjax']);
            return;
        }

    }
    public function store()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $commenter_user = auth();
            $video_id = $_POST['id'];
            $text = $_POST['text'];
            $error=[];

            //check text
            if(!Validation::stringSize($text,5)){
                $error['text'] ="  لطفا  برای دیدگاهت  متنی یادداشت کن !!";
            }
            if(!empty($error)){
                echo json_encode(['process' => 'error' ,'data' => $error ]);
                return;
            }
            $sql = "insert into comments (text , user_id , video_id ,show_comments , created_at) values (:text , :user_id , :video_id , :show_comments , :created_at)";
            $this->db->query($sql,[
                'text' => $text ,
                'user_id' => $commenter_user['id'] ,
                'video_id' => $video_id ,
                'show_comments' => 0 ,
                'created_at' => Carbon::now() ,
            ]);
            echo json_encode(['process' => 'success']);
            return;
        }
        echo json_encode(['process' => 'notAjax']);
        return;
    }
}