<?php

namespace App\Controllers;
use Carbon\Carbon;
use Framework\Database;
use Framework\Elequent;
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
        $sql2 = "select
                    title,description,user_id,
                    video_path,revision_count,like_count,
                    video_image, confirm_at,chanel_name,avatar_image,video.created_at,video.id
                 from video INNER JOIN users on video.user_id = users.id where revision_count > 0
                 order by revision_count DESC limit 8";
        $sql3 = "select
                    title,description,user_id,
                    video_path,revision_count,like_count,
                    video_image, confirm_at,chanel_name,avatar_image,video.created_at,video.id
                 from video INNER JOIN users on video.user_id = users.id where rate_percent > 0
                 order by rate_percent DESC limit 5";


        $most_revision_videos = $this->db->query($sql2)->fetchAll();
        $best_videos = $this->db->query($sql3)->fetchAll();



        $categories = $this->db->query($sql)->fetchAll();
        Session::set('categories' , $categories);
        $videos = [];
        foreach ($categories as $category){
            $sql = "select title,description,user_id,
                    category_id, confirm_comment ,video_path,revision_count,like_count,
                    video_image, confirm_at,chanel_name,avatar_image,video.created_at,video.id
                    from video  INNER JOIN users ON video.user_id=users.id where category_id=:category_id";
            $videos[$category['persian_name']] =$this->db->query($sql , [
                'category_id' => $category['id']
            ])->fetchAll();
        }

        loadView('home' ,[
            'videos' => $videos,
            'categories' => $categories ,
            'most_revision_videos'=>$most_revision_videos ?? null,
            'best_videos'=>$best_videos ?? null,
        ]);
    }

    public function mostRevision()
    {
        $sql2 = "select
                    title,description,user_id,
                    video_path,revision_count,like_count,
                    video_image, confirm_at,chanel_name,avatar_image,video.created_at,video.id
                 from video INNER JOIN users on video.user_id = users.id where revision_count > 0
                 order by revision_count DESC ";
        $most_revision_videos = $this->db->query($sql2)->fetchAll();


        loadView('most-revision-video' ,[
            'most_revision_videos'=>$most_revision_videos ?? null
        ]);
    }

    protected function reduceByFollowersID($array){
        return array_reduce($array, function($arr, $element) {
            $arr[] = $element['follower_id'];
            return $arr;
        });
    }
    protected function reduceByTagsID($array){
        return array_reduce($array, function($arr, $element) {
            $arr[] = $element['tag_id'];
            return $arr;
        });
    }

    protected function countFollows($user){
        $sql = "SELECT COUNT(id) as follows_count FROM followers WHERE follower_id = :user_id ";

        return $this->db->query($sql , [
           'user_id' => $user['id']
        ])->fetch();
    }

    public function bestVideos()
    {
        $sql2 = "select
                    title,description,user_id,
                    video_path,revision_count,like_count,
                    video_image, confirm_at,chanel_name,avatar_image,video.created_at,video.id
                 from video INNER JOIN users on video.user_id = users.id where rate_percent is not null 
                 order by revision_count DESC ";
        $best_videos = $this->db->query($sql2)->fetchAll();
        loadView('best-video' ,[
            'best_videos'=>$best_videos ?? null
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
            $sql3= "SELECT SUM(revision_count) as revision_all FROM video WHERE user_id= :user_id";
            $channel_revision_count = $this->db->query($sql3 , [
                'user_id' => $user['id']
            ])->fetch();

            $followers_count =  $this->countFollows($user);

            $videos = $this->db->query($sql,[
                'user_id' => $user['id']
            ])->fetchAll();
            $last_video = (array_slice($videos,'0',1)[0]);
            $old_videos = array_slice($videos,1,count($videos));
            if(auth()){
                $user_auth = auth();
                $sql = "select follower_id from followers where user_id=:user_id";
                $folowers = $this->db->query($sql , [
                    'user_id' => $user_auth['id']
                ])->fetchAll();
                if($folowers){
                    $followers_id = $this->reduceByFollowersID($folowers);
                }
            }
            loadView('channel' , [
                'user' => $user ,
                'videos' => $videos,
                'last_video' =>$last_video,
                'old_videos' =>$old_videos,
                'followers_id' => $followers_id ?? null,
                'followers_count' =>$followers_count['follows_count'] ?? '0',
                'channel_revision_count' =>$channel_revision_count['revision_all'] ?? '0'
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

        if($selected_category){
            $selected_category['avatar_image'] = 'category/avatar/'.$selected_category['name'].'.png';
            $selected_category['cover_image'] = 'category/cover/'.$selected_category['name'].'.png';
            loadView('category' ,[
                'videos' => $videos,
                'selected_category' => $selected_category
            ]);
        }else{
            redirect('404');
        }




    }

    protected function updateRevisionVideo($video)
    {
        $sql2 = "Update video set  revision_count=:revision_count  where id=:id ";
        $this->db->query($sql2 , [
            'revision_count' => ($video['revision_count'] ?? '0') +1 ,
            'id' => $video['id']
        ]);
    }

    public function singleVideo($params)
    {

        $sql = "select * from video where id=:id";
        $video = $this->db->query($sql , [
           'id' => $params['id']
        ])->fetch();
        if($video){
            //update - revision- count
            $this->updateRevisionVideo($video);
            //channel_info
            $sql1 ="select * from users where id=:user_id";
            $user_channel_info = $this->db->query($sql1 , [
                'user_id' =>$video['user_id']
            ])->fetch();

            //count - followers
            $followers_count =  $this->countFollows($user_channel_info);
            //user - follow -status
            if($user_channel_info && auth()){
                    $user_auth = auth();
                    $sql2 = "select follower_id from followers where user_id=:user_id";
                    $folowers = $this->db->query($sql2 , [
                        'user_id' => $user_auth['id']
                    ])->fetchAll();
                    if($folowers){
                        $followers_id = $this->reduceByFollowersID($folowers);
                    }
            }
            //get-comments
//            $sql3 ="select * from comments where video_id=:video_id";
            $sql3 ="select nick_name,avatar_image,chanel_name,comments.created_at,text,users.id,comments.id,like_count,show_comments from comments  
                    INNER JOIN users ON comments.user_id=users.id 
                    where video_id=:video_id AND show_comments=1";
            $comments = $this->db->query($sql3 , [
                'video_id' => $video['id']
            ])->fetchAll();



            //similar_video
            $sql = "select * from video where category_id=:category_id and id!=:id";
            $similar_videos = $this->db->query($sql , [
               'category_id' => $video['category_id'] ,
               'id' => $video['id']
            ])->fetchAll();

            //get tags
            $sql2 = "select * from tag_video where video_id=:video_id ";
            $tag_video_ids = $this->db->query($sql2 , [
                'video_id' => $video['id'] ,
            ])->fetchAll();
            if(count($tag_video_ids) > 0){
                $tags_id = $this->reduceByTagsID($tag_video_ids);
                $string_tags_id = implode(',',$tags_id);
                $sql3= "select * from tags where id in (".$string_tags_id.")";
                $tags = $this->db->query($sql3)->fetchAll();
            }

            //get users favorite
            if(auth()){
                $sql4= "select video_id from favorites where user_id=:user_id";
                $favorites = $this->db->query($sql4 , [
                    'user_id' => auth()['id']
                ])->fetchAll();

                $user_video_fave_ids = array_column($favorites , 'video_id');

            }

            loadView('single-page' , [
                'video' => $video ,
                'similar_videos' => $similar_videos ,
                'tags' => $tags ?? null ,
                'user_channel_info' => $user_channel_info ?? null,
                'followers_id' =>$followers_id ?? null,
                'followers_count' =>$followers_count ?? '0',
                'comments' =>$comments ?? null,
                'user_video_fave_ids' =>$user_video_fave_ids ?? null,
            ]);
        }else{
           redirect('404');
        }

    }

    protected function addVideoToFavorite($video_id){
        $sql = "select id from favorites where user_id=:user_id and video_id=:video_id";
        $favorite = $this->db->query($sql , [
           'user_id' => auth()['id'],
           'video_id' => $video_id
        ])->fetch();
        if(!$favorite){
            $sql2= "insert into favorites (user_id, video_id, created_at) values (:user_id, :video_id, :created_at)";
            $this->db->query($sql2,[
                'user_id' => auth()['id'],
                'video_id' => $video_id ,
                'created_at' => Carbon::now()
            ]);
        }
        return;
    }

    protected function updateRatePercent($video){

        $sql = "Update video set  rate_percent=:rate_percent  where id=:id ";
        if($video['revision_count'] >= 10){
            return $this->db->query($sql , [
                'rate_percent' => ($video['like_count']/$video['revision_count'])*100 ,
                'id' =>$video['id']
            ]);
        }
        return ;

    }

    public function likes()
    {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $sql1 = "select * from video where id=:id";
            $video = $this->db->query($sql1 , [
                'id' => $_POST['id']
            ])->fetch();
            if($video){
                $sql2 = "Update video set  like_count=:like_count  where id=:id ";
                $this->db->query($sql2 , [
                    'like_count' => ($video['like_count']?? '0') +1 ,
                    'id' => $video['id']
                ]);
                //add-to-favorite
                $this->addVideoToFavorite($video['id']);

                $sql1 = "select * from video where id=:id";
                $video_u = $this->db->query($sql1 , [
                    'id' => $video['id']
                ])->fetch();

                //update-rate-percent
                $this->updateRatePercent($video_u);
                echo json_encode(['proccess' => 'success'  , 'video_like' => $video_u['like_count']]);
                return;
            }else{
                echo json_encode(['proccess' => 'failed']);
                return;
            }
        }

    }

    protected function RemoveVideoFromFavorite($video_id){
        $sql = "delete  from favorites where user_id=:user_id and video_id=:video_id";
        $favorite = $this->db->query($sql , [
            'user_id' => auth()['id'],
            'video_id' => $video_id
        ]);
        return;
    }

    public function unlikes()
    {
        $sql1 = "select * from video where id=:id";
        $video = $this->db->query($sql1 , [
            'id' => $_POST['id']
        ])->fetch();
        if($video){
            $sql2 = "Update video set  like_count=:like_count  where id=:id ";
            $this->db->query($sql2 , [
                'like_count' => ($video['like_count']?? '0') -1 ,
                'id' => $video['id']
            ]);
            //remove-from-favorite
            $this->RemoveVideoFromFavorite($video['id']);
            $sql1 = "select * from video where id=:id";
            $video_u = $this->db->query($sql1 , [
                'id' => $video['id']
            ])->fetch();

            //update-rate-percent
            $this->updateRatePercent($video_u);
            echo json_encode(['proccess' => 'success'  , 'video_like' => $video_u['like_count']]);
            return;
        }else{
            echo json_encode(['proccess' => 'failed']);
            return;
        }
    }

    public function favorites()
    {
        $sql = "select * from favorites where user_id=:user_id";

        $favorites = $this->db->query($sql , [
            'user_id' =>auth()['id']
        ])->fetchAll();

       if(count($favorites) > 0 ){
           foreach ($favorites as $favorite){

//               $sql = "select * from video inner join users on users.id=video.id where video_id=:video_id";
               $sql2= "select   title,description,user_id,
                    video_path,revision_count,like_count,
                    video_image, confirm_at,chanel_name,avatar_image,video.created_at,video.id
                 from video INNER JOIN users on video.user_id = users.id where video.id= :video_id";
               $videos[] =$this->db->query($sql2 , [
                  'video_id' => $favorite['video_id']
               ])->fetch();
           }
       }



       loadView('favorites' , [
           'videos' => $videos ?? null
       ]);
    }


}