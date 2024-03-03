<?php

$sql= "select * from category";
$config = require basePath('config/db.php');
$db = new Database($config);
$categories = $db->query($sql)->fetchAll();


adminView('categories',[
    'categories' => $categories ,
]);

