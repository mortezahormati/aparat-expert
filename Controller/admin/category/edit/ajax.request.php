<?php

$config = require basePath('config/db.php');
$db = new Database($config);

if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD']==='GET' && !empty($_GET)){

   $sql = "select * from category where id=:id";
   $sql2 = "select * from category where id!=:id ";
   $sql3 = "select id,persian_name from category where id=:parent_id";
   $params=[
       'id'=> $_GET['id']
   ];
   $sta['self'] = $db->query($sql,$params)->fetch();
   if($sta['self']['parent_id'] !== null){
      $par=[
          'parent_id' => $sta['self']['parent_id']
      ];
      $sta['parent'] = $db->query($sql3 , $par)->fetch();
   }
   $sta2['all'] = $db->query($sql2,$params)->fetchAll();
   $stats = array_merge($sta ,$sta2);
   echo json_encode($stats);
}


if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD']==='POST' && !empty($_POST)) {

   $sql = "update  category set name=:name , persian_name=:persian_name , parent_id=:parent_id  where id=:id";
   $params = [
       'name' => $_POST['name'] ,
       'persian_name' => $_POST['persian_name']  ,
       'parent_id' => $_POST['parent_id']== 0 ? null : $_POST['parent_id'],
       'id' => $_POST['cat_id'] ,
   ];
   $db->query($sql ,$params);


   echo json_encode('updated finish in database !!!');
}


?>


