<?php




$config = require basePath('config/db.php');
$db = new Database($config);
if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD']==='GET') {


    $id = $_GET['id'];
    $sql = "SELECT id,persian_name from category where id=:id";
    $data = $db->query($sql)->fetch();

    echo json_encode($data);

}
if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest' && $_SERVER['REQUEST_METHOD']==='POST') {
   $sql = "insert into category (name , persian_name , parent_id) values (:name , :persian_name , :parent_id)";
    $params = [
        'name' => $_POST['name'] ,
        'persian_name' => $_POST['persian_name']  ,
        'parent_id' => $_POST['parent_id'] ,
    ];
    $db->query($sql ,$params);


    echo json_encode('inserted in database !!!');
}
?>


